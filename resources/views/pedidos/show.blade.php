@extends('adminlte::page')

@section('title', 'Detalle del Pedido')

@section('content_header')
    <h1>Detalle del Pedido #{{ $pedido->id }}</h1>
@stop

@section('content')
<x-adminlte-card theme="light">

    <div class="row mb-4">
        <div class="col-md-3">
            <x-adminlte-info-box title="Mesa" text="{{ $pedido->num_mesa }}" icon="fas fa-chair" theme="info"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-info-box title="Fecha" text="{{ \Carbon\Carbon::parse($pedido->fecha)->format('d/m/Y H:i') }}" icon="fas fa-calendar" theme="info"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-info-box title="Estado" text="{{ $pedido->estado }}" icon="fas fa-clipboard-check" theme="info"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-info-box title="Usuario" text="{{ $pedido->usuario->name ?? 'Sin asignar' }}" icon="fas fa-user" theme="info"/>
        </div>
    </div>

    <h4 class="mb-3"><i class="fas fa-utensils"></i> Productos del Pedido</h4>

    @if($pedido->detalles->count() > 0)
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedido->detalles as $detalle)
                    <tr>
                        <td>{{ $detalle->nombre }}</td>
                        <td>{{ $detalle->cantidad }}</td>
                        <td>${{ number_format($detalle->precio, 0, ',', '.') }}</td>
                        <td>${{ number_format($detalle->subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right mt-3">
            <h4>Total: <span class="text-primary">${{ number_format($pedido->total, 0, ',', '.') }}</span></h4>
        </div>
    @else
        <p class="text-muted">No hay productos registrados en este pedido.</p>
    @endif

    <x-adminlte-card title="Observaciones" icon="fas fa-comment" theme="info" class="mt-4">
        @if($pedido->observaciones)
            <p class="mb-0">{{ $pedido->observaciones }}</p>
        @else
            <p class="text-muted mb-0">Sin observaciones.</p>
        @endif
    </x-adminlte-card>

    <div class="mt-4">
        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
            <i class="fas fa-undo"></i> Volver
        </a>
    </div>
</x-adminlte-card>
@stop
