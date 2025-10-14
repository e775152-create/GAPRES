@extends('adminlte::page')

@section('title', 'Detalle del Proveedor')

@section('content_header')
    <h1>Detalle del Proveedor #{{ $proveedor->id }}</h1>
@stop

@section('content')
<x-adminlte-card theme="light">

    <div class="row mb-4">
        <div class="col-md-3">
            <x-adminlte-info-box title="Nombre" text="{{ $proveedor->nombre }}" icon="fas fa-user" theme="info"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-info-box title="NIT" text="{{ $proveedor->nit }}" icon="fas fa-id-card" theme="info"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-info-box title="Email" text="{{ $proveedor->email }}" icon="fas fa-envelope" theme="info"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-info-box title="Teléfono" text="{{ $proveedor->telefono }}" icon="fas fa-phone" theme="info"/>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <x-adminlte-info-box title="Dirección" text="{{ $proveedor->direccion }}" icon="fas fa-map-marker-alt" theme="info"/>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
            <i class="fas fa-undo"></i> Volver
        </a>
    </div>

</x-adminlte-card>
@stop
