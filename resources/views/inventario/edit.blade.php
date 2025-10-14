@extends('adminlte::page')

@section('title', 'Editar Insumo')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Insumo</h1>
@stop

@section('content')
<x-adminlte-card>
    <form method="POST" action="{{ route('inventario.update', $insumo->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <x-adminlte-input name="nombre" label="Nombre" :value="$insumo->nombre" fgroup-class="col-md-6"/>
            <x-adminlte-input name="categoria" label="Categoría" :value="$insumo->categoria" fgroup-class="col-md-6"/>
        </div>
        <div class="row">
            <x-adminlte-input name="cantidad" label="Cantidad" type="number" :value="$insumo->cantidad" fgroup-class="col-md-3"/>
            <x-adminlte-input name="unidad" label="Unidad" :value="$insumo->unidad" fgroup-class="col-md-3"/>
            <x-adminlte-input name="precio_unitario" label="Precio Unitario" type="number" step="0.01" :value="$insumo->precio_unitario" fgroup-class="col-md-3"/>
            <x-adminlte-select name="estado" label="Estado" fgroup-class="col-md-3">
                <option value="Disponible" {{ $insumo->estado == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="Agotado" {{ $insumo->estado == 'Agotado' ? 'selected' : '' }}>Agotado</option>
            </x-adminlte-select>
        </div>

        <x-adminlte-button class="btn btn-success mr-2" type="submit" label="Guardar Cambios" icon="fas fa-save"/>
        <a href="{{ route('inventario.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i> Cancelar</a>
    </form>
</x-adminlte-card>
@stop
