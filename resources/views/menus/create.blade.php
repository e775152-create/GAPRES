@extends('adminlte::page')

@section('title', 'Nuevo Pedido')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Pedido</h1>
@stop

@section('content')
<x-adminlte-card>
    <form method="POST" action="{{ route('pedidos.store') }}">
        @csrf
        {{-- Selección de Mesa --}}
        <div class="row mb-3">
            <label class="col-md-2">Mesa:</label>
            <div class="col-md-4">
                <select name="num_mesa" class="form-control" required>
                    <option value="">Seleccione una Mesa</option>
                    @foreach($mesas as $mesa)
                    <option value="{{ $mesa->numero }}">Mesa {{ $mesa->numero }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Selección de Productos --}}
        <h4>Productos</h4>
        @foreach($menus as $menu)
        <div class="row mb-2 align-items-center">
            <div class="col-md-6">
                {{ $menu->nombre }} (${{ number_format($menu->precio, 0) }})
            </div>
            <div class="col-md-2">
                <input type="number" name="productos[{{ $menu->id }}][cantidad]" value="0" min="0" class="form-control">
                <input type="hidden" name="productos[{{ $menu->id }}][menu_id]" value="{{ $menu->id }}">
            </div>
        </div>
        @endforeach

        {{-- Total --}}
        <h4>Total: <span id="total">0</span></h4>

        {{-- Botones --}}
        <div class="row mt-3">
            <div class="form-group col-md-6">
                <x-adminlte-button class="btn btn-primary mr-2" type="submit" label="Guardar Pedido" theme="primary"
                    icon="fas fa-save" />
                <a href="{{ route('pedidos.index') }}" class="btn btn-secondary mr-2"><i class="fas fa-undo"></i> Cancelar</a>
            </div>
        </div>
    </form>
</x-adminlte-card>

@if (session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif
@stop

@section('js')
<script>
    // Actualizar total automáticamente al cambiar cantidades
    const inputs = document.querySelectorAll('input[name^="productos"][type="number"]');
    const totalSpan = document.getElementById('total');

    function actualizarTotal() {
        let total = 0;
        inputs.forEach(input => {
            const cantidad = parseInt(input.value) || 0;
            const precio = parseFloat(input.closest('.row').querySelector('div:first-child').innerText.replace(/[^0-9.]/g, '')) || 0;
            total += cantidad * precio;
        });
        totalSpan.innerText = total;
    }

    inputs.forEach(input => input.addEventListener('input', actualizarTotal));
</script>
@stop
