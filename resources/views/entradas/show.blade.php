@extends('adminlte::page')

@section('title', 'Detalle de Entrada')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle de la Entrada #{{ $entrada->id }}</h1>
@stop

@section('content')
<x-adminlte-card>
    <div class="row mb-4">
        <div class="col-md-4">
            <x-adminlte-info-box title="Fecha" text="{{ \Carbon\Carbon::parse($entrada->fecha)->format('d/m/Y') }}" icon="fas fa-calendar" theme="info"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Proveedor" text="{{ $entrada->proveedor->nombre ?? 'Sin proveedor' }}" icon="fas fa-truck" theme="info"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Empleado" text="{{ $entrada->empleado->nombre ?? 'Sin empleado' }}" icon="fas fa-user" theme="info"/>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <x-adminlte-info-box title="Total" text="${{ number_format($entrada->total, 0, ',', '.') }}" icon="fas fa-dollar-sign" theme="info"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Estado" text="{{ $entrada->estado }}" icon="fas fa-clipboard-check" theme="info"/>
        </div>
    </div>

    <x-adminlte-card title="Descripción" icon="fas fa-comment" theme="info" class="mt-4">
        @if($entrada->descripcion)
            <p class="mb-0">{{ $entrada->descripcion }}</p>
        @else
            <p class="text-muted mb-0">Sin descripción.</p>
        @endif
    </x-adminlte-card>

    <div class="mt-4">
        <a href="{{ route('entradas.index') }}" class="btn btn-secondary">
            <i class="fas fa-undo"></i> Volver
        </a>
    </div>
</x-adminlte-card>
@stop
