@extends('adminlte::page')

@section('title', 'Nuevo Pedido')

@section('content_header')
    <h1>Nuevo Pedido</h1>
@stop

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Selección de Mesa --}}
<x-adminlte-card title="Seleccione una Mesa" theme="info">
    <div class="row">
        @foreach($mesas as $mesa)
        <div class="col-md-3">
            <div class="card h-100">
                <img src="{{ asset('vendor/adminlte/dist/img/mesa.jpeg') }}"
                     alt="Mesa {{ $mesa->numero }}"
                     class="card-img-top img-fluid"
                     style="height:160px;object-fit:cover;">
                <div class="card-body text-center">
                    <h5>Mesa {{ $mesa->numero }}</h5>
                    <button type="button" class="btn btn-primary seleccionar-mesa" data-id="{{ $mesa->numero }}">
                        Seleccionar
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <p class="mt-3">
        <strong>Mesa seleccionada:</strong> 
        <span id="mesa_numero" class="text-primary">Ninguna</span>
    </p>
</x-adminlte-card>

{{-- Selección de Productos --}}
<x-adminlte-card title="Seleccione Productos" theme="success">
    <ul class="nav nav-tabs" id="categoriaTabs" role="tablist">
        @foreach($productosPorCategoria as $categoria => $productos)
            <li class="nav-item" role="presentation">
                <button class="nav-link @if($loop->first) active @endif" 
                        id="tab-{{ Str::slug($categoria) }}" 
                        data-bs-toggle="tab" 
                        data-bs-target="#categoria-{{ Str::slug($categoria) }}" 
                        type="button" role="tab">
                    {{ $categoria }}
                </button>
            </li>
        @endforeach
    </ul>
    <div class="tab-content mt-3">
        @foreach($productosPorCategoria as $categoria => $productos)
            <div class="tab-pane fade @if($loop->first) show active @endif" 
                 id="categoria-{{ Str::slug($categoria) }}" 
                 role="tabpanel">
                <div class="row">
                    @foreach($productos as $producto)
                        <div class="col-md-3 mb-3">
                            <div class="card h-100">
                                <img src="{{ asset('img/productos/'.$producto->imagen) }}" 
                                     class="card-img-top" 
                                     alt="{{ $producto->nombre }}" 
                                     style="height:160px;object-fit:cover;">
                                <div class="card-body text-center">
                                    <h5>{{ $producto->nombre }}</h5>
                                    <p><strong>${{ number_format($producto->precio, 0, ',', '.') }}</strong></p>
                                    <button class="btn btn-success agregar-producto"
                                        data-id="{{ $producto->id }}"
                                        data-nombre="{{ $producto->nombre }}"
                                        data-precio="{{ $producto->precio }}">
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-adminlte-card>

{{-- Pedido Actual --}}
<x-adminlte-card title="Pedido Actual" theme="dark">
    <form method="POST" action="{{ route('pedidos.store') }}">
        @csrf

        <input type="hidden" name="num_mesa" id="mesa_id">
        <input type="hidden" name="fecha" value="{{ now()->format('Y-m-d') }}">
        <input type="hidden" name="id_usuario" value="{{ auth()->user()->id ?? 1 }}">
        <input type="hidden" name="total" id="input_total">
        <input type="hidden" name="estado" value="PENDIENTE">

        <table class="table table-bordered" id="pedido-table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <h4>Total: <span id="total">0</span></h4>

        {{-- Método de Pago --}}
        <div class="form-group">
    <label for="metodo_pago">Método de Pago</label>
    <select name="metodo_pago" id="metodo_pago" class="form-control" required>
        <option value="efectivo">Efectivo</option>
        <option value="tarjeta">Tarjeta</option>
    </select>
</div>


        {{-- Observaciones --}}
        <div class="form-group mt-3">
            <label for="observaciones"><strong>Observaciones:</strong></label>
            <textarea name="observaciones" id="observaciones" class="form-control" rows="3" placeholder="Escribe aquí alguna observación del pedido..."></textarea>
        </div>

        <div class="form-group col-md-6 mt-3">
            <x-adminlte-button class="btn btn-primary mr-2" type="submit" label="Guardar Pedido" theme="primary" icon="fas fa-save" />
            <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
                <i class="fas fa-undo"></i> Cancelar
            </a>
        </div>
    </form>
</x-adminlte-card>

@if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    let total = 0;
    let index = 0;

    document.querySelectorAll('.seleccionar-mesa').forEach(btn => {
        btn.addEventListener('click', function () {
            document.getElementById('mesa_id').value = this.dataset.id;
            document.getElementById('mesa_numero').innerText = this.dataset.id;
            Swal.fire('Mesa seleccionada!', 'Has seleccionado la mesa ' + this.dataset.id, 'success');
        });
    });

    document.querySelectorAll('.agregar-producto').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;
            const nombre = this.dataset.nombre;
            const precio = parseFloat(this.dataset.precio);
            const tbody = document.querySelector('#pedido-table tbody');
            let filaExistente = tbody.querySelector(`tr[data-id="${id}"]`);

            if (filaExistente) {
                let inputCantidad = filaExistente.querySelector('.cantidad');
                inputCantidad.value = parseInt(inputCantidad.value) + 1;
                let nuevoSubtotal = parseFloat(inputCantidad.value) * precio;
                filaExistente.querySelector('.subtotal').innerText = formatearPesos(nuevoSubtotal);
            } else {
                let fila = document.createElement('tr');
                fila.setAttribute('data-id', id);
                fila.innerHTML = `
                    <td>${nombre}<input type="hidden" name="productos[${index}][id]" value="${id}"></td>
                    <td>${formatearPesos(precio)}<input type="hidden" name="productos[${index}][precio]" value="${precio}"></td>
                    <td><input type="number" name="productos[${index}][cantidad]" value="1" min="1" class="form-control cantidad"></td>
                    <td class="subtotal">${formatearPesos(precio)}</td>
                    <td><button type="button" class="btn btn-danger btn-sm eliminar">X</button></td>
                `;
                tbody.appendChild(fila);
                fila.querySelector('.eliminar').addEventListener('click', function () {
                    fila.remove();
                    actualizarTotal();
                });
                fila.querySelector('.cantidad').addEventListener('change', function () {
                    let nuevaCantidad = parseInt(this.value);
                    if (nuevaCantidad < 1 || isNaN(nuevaCantidad)) {
                        this.value = 1;
                        nuevaCantidad = 1;
                    }
                    let nuevoSubtotal = nuevaCantidad * precio;
                    fila.querySelector('.subtotal').innerText = formatearPesos(nuevoSubtotal);
                    actualizarTotal();
                });
                index++;
            }

            actualizarTotal();
        });
    });

    function actualizarTotal() {
        let sum = 0;
        document.querySelectorAll('.subtotal').forEach(s => {
            sum += parseFloat(s.innerText.replace(/\$|\./g, '')) || 0;
        });
        total = sum;
        document.getElementById('total').innerText = formatearPesos(total);
        document.getElementById('input_total').value = total;
    }

    function formatearPesos(valor) {
        return '$' + valor.toLocaleString('es-CO', { minimumFractionDigits: 0 });
    }

    document.querySelector('form').addEventListener('submit', function (e) {
        if (!document.getElementById('mesa_id').value) {
            e.preventDefault();
            Swal.fire('Error', 'Debes seleccionar una mesa antes de guardar.', 'error');
        }
        if (document.querySelectorAll('#pedido-table tbody tr').length === 0) {
            e.preventDefault();
            Swal.fire('Error', 'Debes agregar al menos un producto al pedido.', 'error');
        }
    });

    document.querySelectorAll('#categoriaTabs button').forEach(tabBtn => {
        tabBtn.addEventListener('click', function (e) {
            e.preventDefault();
            let tab = new bootstrap.Tab(this);
            tab.show();
        });
    });
</script>
@stop
