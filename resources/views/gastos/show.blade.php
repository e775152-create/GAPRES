@extends('adminlte::page')

@section('title', 'Detalle del Gasto')

@section('content_header')
<h1 class="m-0 text-dark">Detalle del Gasto #{{ $gasto->id }}</h1>
@stop

@section('content')
<x-adminlte-card>
    <div class="row">
        <div class="col-md-4">
            <x-adminlte-info-box title="Concepto" text="{{ $gasto->concepto }}" icon="fas fa-file-alt" theme="info"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Monto" text="${{ number_format($gasto->monto, 0, ',', '.') }}" icon="fas fa-money-bill" theme="info"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Fecha" text="{{ \Carbon\Carbon::parse($gasto->fecha)->format('d/m/Y') }}" icon="fas fa-calendar" theme="info"/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <x-adminlte-info-box title="Categoría" text="{{ $gasto->categoria ?? 'No especificada' }}" icon="fas fa-list" theme="info"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Método de Pago" text="{{ $gasto->metodo_pago ?? 'No especificado' }}" icon="fas fa-credit-card" theme="info"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Empleado Responsable" text="{{ $gasto->empleado->nombre ?? 'No asignado' }}" icon="fas fa-user" theme="info"/>
        </div>
    </div>

    <x-adminlte-card title="Descripción" icon="fas fa-comment" theme="lightblue" class="mt-3">
        <p>{{ $gasto->descripcion ?? 'Sin descripción.' }}</p>
    </x-adminlte-card>

    <a href="{{ route('gastos.index') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-undo"></i> Volver
    </a>
</x-adminlte-card>
@stop
