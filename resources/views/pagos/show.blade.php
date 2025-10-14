@extends('adminlte::page')

@section('title', 'Detalle del Pago')

@section('content_header')
    <h1>Detalle del Pago #{{ $pago->id }}</h1>
@stop

@section('content')
<x-adminlte-card theme="light" title="Información del Pago">

    <div class="row mb-3">
        <div class="col-md-4">
            <x-adminlte-info-box title="Empleado" text="{{ $pago->empleado->nombre }}" icon="fas fa-user" theme="info"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Monto" text="${{ number_format($pago->monto, 0, ',', '.') }}" icon="fas fa-dollar-sign" theme="success"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Fecha de Pago" text="{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}" icon="fas fa-calendar" theme="primary"/>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <x-adminlte-info-box title="Tipo de Pago" text="{{ $pago->tipo_pago }}" icon="fas fa-clipboard-list" theme="warning"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Estado" text="{{ $pago->estado }}" icon="fas fa-toggle-on" theme="secondary"/>
        </div>
    </div>

    <x-adminlte-card title="Observaciones" icon="fas fa-comment" theme="info" class="mt-3">
        @if ($pago->observacion)
            <p>{{ $pago->observacion }}</p>
        @else
            <p class="text-muted">Sin observaciones registradas.</p>
        @endif
    </x-adminlte-card>

    <div class="mt-4">
        <a href="{{ route('pagos.index') }}" class="btn btn-secondary">
            <i class="fas fa-undo"></i> Volver
        </a>
        <a href="{{ route('pagos.edit', $pago->id) }}" class="btn btn-success">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>

</x-adminlte-card>
@stop
