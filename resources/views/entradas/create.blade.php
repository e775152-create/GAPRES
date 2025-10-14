@extends('adminlte::page')

@section('title', 'Registrar Entrada')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Nueva Entrada</h1>
@stop

@section('content')
<x-adminlte-card>
    <form method="POST" action="{{ route('entradas.store') }}">
        @csrf
        <div class="row">
            <x-adminlte-input name="fecha" label="Fecha" type="date" fgroup-class="col-md-4" value="{{ date('Y-m-d') }}" />
            <x-adminlte-select name="proveedor_id" label="Proveedor" fgroup-class="col-md-4">
                <option value="">Seleccionar Proveedor</option>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </x-adminlte-select>
            <x-adminlte-select name="empleado_id" label="Empleado" fgroup-class="col-md-4">
                <option value="">Seleccionar Empleado</option>
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                @endforeach
            </x-adminlte-select>
        </div>

        <div class="row">
            <x-adminlte-input name="total" label="Total" placeholder="Valor total" fgroup-class="col-md-4" type="number" step="0.01" />
            <x-adminlte-select name="estado" label="Estado" fgroup-class="col-md-4">
                <option value="Recibido">Recibido</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Anulado">Anulado</option>
            </x-adminlte-select>
        </div>

        <div class="row">
            <x-adminlte-textarea name="descripcion" label="Descripción" rows=3 fgroup-class="col-md-12" placeholder="Detalle o notas adicionales..." />
        </div>

        <x-adminlte-button class="btn btn-primary mr-2" type="submit" label="Guardar Entrada" icon="fas fa-save"/>
        <a href="{{ route('entradas.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i> Cancelar</a>
    </form>
</x-adminlte-card>
@stop
