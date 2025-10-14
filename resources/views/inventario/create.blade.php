@extends('adminlte::page')

@section('title', 'Registrar Insumo')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Insumo</h1>
@stop

@section('content')
<x-adminlte-card>
    <form method="POST" action="{{ route('inventario.store') }}">
        @csrf
        <div class="row">
            <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del insumo" fgroup-class="col-md-6"/>
            <x-adminlte-input name="categoria" label="Categoría" placeholder="Ej: Bebidas, Carnes..." fgroup-class="col-md-6"/>
        </div>
        <div class="row">
            <x-adminlte-input name="cantidad" label="Cantidad" type="number" placeholder="Cantidad actual" fgroup-class="col-md-3"/>
            <x-adminlte-input name="unidad" label="Unidad de medida" placeholder="Kg, Litros, Unidades..." fgroup-class="col-md-3"/>
            <x-adminlte-input name="precio_unitario" label="Precio Unitario" type="number" step="0.01" placeholder="0.00" fgroup-class="col-md-3"/>
            <x-adminlte-select name="estado" label="Estado" fgroup-class="col-md-3">
                <option value="Disponible">Disponible</option>
                <option value="Agotado">Agotado</option>
            </x-adminlte-select>
        </div>

        <x-adminlte-button class="btn btn-primary mr-2" type="submit" label="Guardar Insumo" icon="fas fa-save"/>
        <a href="{{ route('inventario.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i> Cancelar</a>
    </form>
</x-adminlte-card>
@stop
