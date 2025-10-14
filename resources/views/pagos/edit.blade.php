@extends('adminlte::page')

@section('title', 'Editar Pago')

@section('content_header')
    <h1>Editar Pago #{{ $pago->id }}</h1>
@stop

@section('content')
    <x-adminlte-card theme="light" title="Actualizar Información">

        <form action="{{ route('pagos.update', $pago->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-adminlte-select name="empleado_id" label="Empleado">
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id }}" {{ $empleado->id == $pago->empleado_id ? 'selected' : '' }}>
                                {{ $empleado->nombre }}
                            </option>
                        @endforeach
                    </x-adminlte-select>
                </div>

                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="monto" label="Monto ($)" type="number" step="0.01" value="{{ $pago->monto }}" required />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="fecha_pago" label="Fecha de Pago" type="date" value="{{ $pago->fecha_pago }}" required />
                </div>

                <div class="col-md-6 mb-3">
                    <x-adminlte-select name="tipo_pago" label="Tipo de Pago">
                        <option value="Sueldo" {{ $pago->tipo_pago == 'Sueldo' ? 'selected' : '' }}>Sueldo</option>
                        <option value="Bono" {{ $pago->tipo_pago == 'Bono' ? 'selected' : '' }}>Bono</option>
                        <option value="Propina" {{ $pago->tipo_pago == 'Propina' ? 'selected' : '' }}>Propina</option>
                        <option value="Otro" {{ $pago->tipo_pago == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </x-adminlte-select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <x-adminlte-textarea name="observacion" label="Observaciones" rows=3>{{ $pago->observacion }}</x-adminlte-textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-adminlte-select name="estado" label="Estado">
                        <option value="Realizado" {{ $pago->estado == 'Realizado' ? 'selected' : '' }}>Realizado</option>
                        <option value="Pendiente" {{ $pago->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="Anulado" {{ $pago->estado == 'Anulado' ? 'selected' : '' }}>Anulado</option>
                    </x-adminlte-select>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('pagos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-undo"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Actualizar
                </button>
            </div>
        </form>

    </x-adminlte-card>
@stop
