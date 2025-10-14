@extends('adminlte::page')

@section('title', 'Detalle del Empleado')

@section('content_header')
    <h1>Detalle del Empleado #{{ $empleado->id }}</h1>
@stop

@section('content')
<x-adminlte-card theme="light">

    <div class="row mb-4">
        <div class="col-md-4">
            <x-adminlte-info-box title="Nombre" text="{{ $empleado->nombre }}" icon="fas fa-user" theme="info"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Documento" text="{{ $empleado->documento ?? 'No registrado' }}" icon="fas fa-id-card" theme="info"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Cargo" text="{{ $empleado->cargo ?? 'Sin asignar' }}" icon="fas fa-briefcase" theme="info"/>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <x-adminlte-info-box title="Correo" text="{{ $empleado->email ?? 'No registrado' }}" icon="fas fa-envelope" theme="info"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Teléfono" text="{{ $empleado->telefono ?? 'No registrado' }}" icon="fas fa-phone" theme="info"/>
        </div>
        <div class="col-md-4">
            <x-adminlte-info-box title="Dirección" text="{{ $empleado->direccion ?? 'No registrada' }}" icon="fas fa-map-marker-alt" theme="info"/>
        </div>
    </div>

    <x-adminlte-info-box title="Estado" text="{{ $empleado->estado }}" icon="fas fa-clipboard-check" theme="info"/>

    <div class="mt-4">
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
            <i class="fas fa-undo"></i> Volver
        </a>
    </div>

</x-adminlte-card>
@stop
