@extends('adminlte::page')

@section('title', 'Nuevo Pedido')

@section('content_header')
    <h1>Nuevo Pedido</h1>
@stop

@section('content')

{{-- Mostrar errores de validación --}}
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
                {{-- Ahora usamos el campo foto de cada mesa --}}
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
    <div class="row">
        @foreach($productos as $producto)
        <div class="col-md-3">
            <div class="card h-100">
                <img src="{{ asset('img/productos/'.$producto->imagen) }}" 
                     class="card-img-top" 
                     alt="{{ $producto->nombre }}" 
                     style="height:160px;object-fit:cover;">
                <div class="card-body text-center">
                    <h5>{{ $producto->nombre }}</h5>
                    <p><strong>${{ $producto->precio }}</strong></p>
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
</x-adminlte-card>

{{-- Pedido Actual --}}
<x-adminlte-card title="Pedido Actual" theme="dark">
    <form method="POST" action="{{ route('pedidos.store') }}">
        @csrf

        {{-- Campos ocultos --}}
        <input type="hidden" name="num_mesa" id="mesa_id">
        <input type="hidden" name="fecha" value="{{ now()->format('Y-m-d') }}">
        <input type="hidden" name="id_usuario" value="{{ auth()->user()->id ?? 1 }}">
        <input type="hidden" name="total" id="input_total">
        <input type="hidden" name="estado" value="PENDIENTE">

        {{-- Tabla de productos --}}
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

        <h4>Total: $<span id="total">0.00</span></h4>

        <div class="form-group col-md-6 mt-3">
            <x-adminlte-button class="btn btn-primary mr-2" type="submit" label="Guardar Pedido" theme="primary" icon="fas fa-save" />
            <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
                <i class="fas fa-undo"></i> Cancelar
            </a>
        </div>
    </form>
</x-adminlte-card>

{{-- Mensaje de éxito --}}
@if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

@stop

@section('js')
<script>
    let total = 0;
    let index = 0;

    // Seleccionar mesa
    document.querySelectorAll('.seleccionar-mesa').forEach(btn => {
        btn.addEventListener('click', function () {
            document.getElementById('mesa_id').value = this.dataset.id;
            document.getElementById('mesa_numero').innerText = this.dataset.id;
            Swal.fire('Mesa seleccionada!', 'Has seleccionado la mesa ' + this.dataset.id, 'success');
        });
    });

    // Agregar productos
    document.querySelectorAll('.agregar-producto').forEach(btn => {
        btn.addEventListener('click', function () {
            let id = this.dataset.id;
            let nombre = this.dataset.nombre;
            let precio = parseFloat(this.dataset.precio);

            let tbody = document.querySelector('#pedido-table tbody');
            let fila = document.createElement('tr');
            fila.innerHTML = `
                <td>
                    ${nombre}
                    <input type="hidden" name="productos[${index}][id]" value="${id}">
                </td>
                <td>
                    $${precio}
                    <input type="hidden" name="productos[${index}][precio]" value="${precio}">
                </td>
                <td>
                    <input type="number" name="productos[${index}][cantidad]" value="1" min="1" class="form-control cantidad">
                </td>
                <td class="subtotal">${precio.toFixed(2)}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm eliminar">X</button>
                </td>
            `;

            tbody.appendChild(fila);
            actualizarTotal();

            // Eliminar fila
            fila.querySelector('.eliminar').addEventListener('click', function () {
                fila.remove();
                actualizarTotal();
            });

            // Cambiar cantidad
            fila.querySelector('.cantidad').addEventListener('change', function () {
                let nuevaCantidad = parseInt(this.value);
                if (nuevaCantidad < 1 || isNaN(nuevaCantidad)) {
                    this.value = 1;
                    nuevaCantidad = 1;
                }
                let nuevoSubtotal = nuevaCantidad * precio;
                fila.querySelector('.subtotal').innerText = nuevoSubtotal.toFixed(2);
                actualizarTotal();
            });

            index++;
        });
    });

    function actualizarTotal() {
        let sum = 0;
        document.querySelectorAll('.subtotal').forEach(s => {
            sum += parseFloat(s.innerText);
        });
        total = sum;
        document.getElementById('total').innerText = total.toFixed(2);
        document.getElementById('input_total').value = total.toFixed(2);
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
</script>
@stop
