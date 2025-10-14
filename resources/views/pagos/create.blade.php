@extends('adminlte::page')

@section('title', 'Registrar Pago')

@section('content_header')
    <h1>Registrar Pago a Empleado</h1>
@stop

@section('content')
    <x-adminlte-card theme="light" title="Nuevo Pago">

        <form action="{{ route('pagos.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-adminlte-select name="empleado_id" label="Empleado">
                        <option value="">-- Seleccione un empleado --</option>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                        @endforeach
                    </x-adminlte-select>
                </div>

                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="monto" label="Monto ($)" type="number" step="0.01" required />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="fecha_pago" label="Fecha de Pago" type="date" required />
                </div>

                <div class="col-md-6 mb-3">
                    <x-adminlte-select name="tipo_pago" label="Tipo de Pago">
                        <option value="">-- Seleccione --</option>
                        <option value="Sueldo">Sueldo</option>
                        <option value="Bono">Bono</option>
                        <option value="Propina">Propina</option>
                        <option value="Otro">Otro</option>
                    </x-adminlte-select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <x-adminlte-textarea name="observacion" label="Observaciones" rows=3
                        placeholder="Escriba alguna nota o detalle del pago...">
                    </x-adminlte-textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-adminlte-select name="estado" label="Estado">
                        <option value="Realizado">Realizado</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Anulado">Anulado</option>
                    </x-adminlte-select>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('pagos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-undo"></i> Volver
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar Pago
                </button>
            </div>
        </form>

    </x-adminlte-card>
@stop
