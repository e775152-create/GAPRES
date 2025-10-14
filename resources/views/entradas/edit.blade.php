@extends('adminlte::page')

@section('title', 'Editar Entrada')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Entrada</h1>
@stop

@section('content')
<x-adminlte-card>
    <form method="POST" action="{{ route('entradas.update', $entrada->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <x-adminlte-input name="fecha" label="Fecha" type="date" fgroup-class="col-md-4" :value="$entrada->fecha" />
            <x-adminlte-select name="proveedor_id" label="Proveedor" fgroup-class="col-md-4">
                <option value="">Seleccionar Proveedor</option>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}" {{ $entrada->proveedor_id == $proveedor->id ? 'selected' : '' }}>
                        {{ $proveedor->nombre }}
                    </option>
                @endforeach
            </x-adminlte-select>
            <x-adminlte-select name="empleado_id" label="Empleado" fgroup-class="col-md-4">
                <option value="">Seleccionar Empleado</option>
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->id }}" {{ $entrada->empleado_id == $empleado->id ? 'selected' : '' }}>
                        {{ $empleado->nombre }}
                    </option>
                @endforeach
            </x-adminlte-select>
        </div>

        <div class="row">
            <x-adminlte-input name="total" label="Total" placeholder="Valor total" fgroup-class="col-md-4" type="number" step="0.01" :value="$entrada->total" />
            <x-adminlte-select name="estado" label="Estado" fgroup-class="col-md-4">
                <option value="Recibido" {{ $entrada->estado == 'Recibido' ? 'selected' : '' }}>Recibido</option>
                <option value="Pendiente" {{ $entrada->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="Anulado" {{ $entrada->estado == 'Anulado' ? 'selected' : '' }}>Anulado</option>
            </x-adminlte-select>
        </div>

        <div class="row">
            <x-adminlte-textarea name="descripcion" label="Descripción" rows=3 fgroup-class="col-md-12" :value="$entrada->descripcion" />
        </div>

        <x-adminlte-button class="btn btn-success mr-2" type="submit" label="Actualizar" icon="fas fa-save"/>
        <a href="{{ route('entradas.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i> Cancelar</a>
    </form>
</x-adminlte-card>
@stop
