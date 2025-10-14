@extends('adminlte::page')

@section('title', 'Editar Gasto')

@section('content_header')
<h1 class="m-0 text-dark">Editar Gasto</h1>
@stop

@section('content')
<x-adminlte-card>
    <form method="POST" action="{{ route('gastos.update', $gasto->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <x-adminlte-input name="concepto" label="Concepto" fgroup-class="col-md-6" :value="$gasto->concepto" />
            <x-adminlte-input name="monto" label="Monto" type="number" fgroup-class="col-md-3" :value="$gasto->monto" />
            <x-adminlte-input name="fecha" label="Fecha" type="date" fgroup-class="col-md-3" :value="$gasto->fecha" />
        </div>

        <div class="row">
            <x-adminlte-input name="categoria" label="Categoría" fgroup-class="col-md-4" :value="$gasto->categoria" />
            <x-adminlte-input name="metodo_pago" label="Método de Pago" fgroup-class="col-md-4" :value="$gasto->metodo_pago" />

            <x-adminlte-select name="empleado_id" label="Empleado Responsable" fgroup-class="col-md-4">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-user"></i>
                    </div>
                </x-slot>
                <option value="">Seleccionar...</option>
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->id }}" {{ $empleado->id == $gasto->empleado_id ? 'selected' : '' }}>
                        {{ $empleado->nombre }}
                    </option>
                @endforeach
            </x-adminlte-select>
        </div>

        <div class="row">
            <x-adminlte-textarea name="descripcion" label="Descripción" rows=3 fgroup-class="col-md-12">
                {{ $gasto->descripcion }}
            </x-adminlte-textarea>
        </div>

        <x-adminlte-button class="btn btn-success" type="submit" label="Guardar Cambios" icon="fas fa-save" />
        <a href="{{ route('gastos.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i> Cancelar</a>
    </form>
</x-adminlte-card>
@stop
