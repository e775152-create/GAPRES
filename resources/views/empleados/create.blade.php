@extends('adminlte::page')

@section('title', 'Registrar Empleado')

@section('content_header')
    <h1>Registrar Empleado</h1>
@stop

@section('content')
    <x-adminlte-card theme="light" title="Nuevo empleado">

        <form method="POST" action="{{ route('empleados.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-6">
                    <x-adminlte-input name="nombre" label="Nombre completo" placeholder="Ingrese el nombre completo"
                        value="{{ old('nombre') }}" required />
                </div>

                <div class="col-md-6">
                    <x-adminlte-input name="documento" label="Documento" placeholder="Cédula o documento"
                        value="{{ old('documento') }}" />
                </div>

                <div class="col-md-6">
                    <x-adminlte-input name="cargo" label="Cargo" placeholder="Ej: Cajero, Cocinero, Mesero"
                        value="{{ old('cargo') }}" />
                </div>

                <div class="col-md-6">
                    <x-adminlte-input name="email" label="Correo electrónico" type="email"
                        placeholder="ejemplo@correo.com" value="{{ old('email') }}" />
                </div>

                <div class="col-md-6">
                    <x-adminlte-input name="telefono" label="Teléfono" placeholder="Número de contacto"
                        value="{{ old('telefono') }}" />
                </div>

                <div class="col-md-6">
                    <x-adminlte-input name="direccion" label="Dirección" placeholder="Dirección de residencia"
                        value="{{ old('direccion') }}" />
                </div>

                <div class="col-md-6">
                    <x-adminlte-select name="estado" label="Estado">
                        <option value="Activo" {{ old('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </x-adminlte-select>
                </div>

            </div>

            <div class="mt-3">
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-save" />
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
                    <i class="fas fa-undo"></i> Cancelar
                </a>
            </div>
        </form>

    </x-adminlte-card>
@stop
