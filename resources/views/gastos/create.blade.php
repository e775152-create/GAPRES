@extends('adminlte::page')

@section('title', 'Registrar Gasto')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Gasto</h1>
@stop

@section('content')
<x-adminlte-card>
    <form method="POST" action="{{ route('gastos.store') }}">
        @csrf
        <div class="row">
            <x-adminlte-input name="descripcion" label="Descripción" placeholder="Ej: Compra de verduras" fgroup-class="col-md-6" />
        </div>

        <div class="row">
            <x-adminlte-input name="monto" label="Monto" type="number" step="0.01" placeholder="Ej: 50000" fgroup-class="col-md-3" />
            <x-adminlte-input name="fecha" label="Fecha" type="date" fgroup-class="col-md-3" />
        </div>

        <div class="row">
            <x-adminlte-input name="categoria" label="Categoría" placeholder="Ej: Comida, Suministros, etc." fgroup-class="col-md-4" />
        </div>

        <div class="row">
            <x-adminlte-select name="empleado_id" label="Empleado" fgroup-class="col-md-4">
                <option value="">Seleccionar empleado</option>
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                @endforeach
            </x-adminlte-select>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-6">
                <x-adminlte-button class="btn btn-primary" type="submit" label="Guardar Gasto" icon="fas fa-save" />
                <a href="{{ route('gastos.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i> Cancelar</a>
            </div>
        </div>
    </form>
</x-adminlte-card>
@stop
