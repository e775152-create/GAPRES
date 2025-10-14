@extends('adminlte::page')

@section('title', 'Editar Empleado')

@section('content_header')
    <h1>Editar Empleado</h1>
@stop

@section('content')
    <x-adminlte-card theme="light" title="Actualizar información del empleado">

        <form method="POST" action="{{ route('empleados.update', $empleado->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-md-6">
                    <x-adminlte-input name="nombre" label="Nombre completo" value="{{ old('nombre', $empleado->nombre) }}"
                        placeholder="Ingrese el nombre completo" required />
                </div>

                <div class="col-md-6">
                    <x-adminlte-input name="documento" label="Documento"
                        value="{{ old('documento', $empleado->documento) }}" placeholder="Cédula o documento" />
                </div>

                <div class="col-md-6">
                    <x-adminlte-input name="cargo" label="Cargo" value="{{ old('cargo', $empleado->cargo) }}"
                        placeholder="Ej: Cajero, Cocinero, Mesero" />
                </div>

                <div class="col-md-6">
                    <x-adminlte-input name="email" label="Correo electrónico" type="email"
                        value="{{ old('email', $empleado->email) }}" placeholder="ejemplo@correo.com" />
                </div>

                <div class="col-md-6">
                    <x-adminlte-input name="telefono" label="Teléfono" value="{{ old('telefono', $empleado->telefono) }}"
                        placeholder="Número de contacto" />
                </div>

                <div class="col-md-6">
                    <x-adminlte-input name="direccion" label="Dirección"
                        value="{{ old('direccion', $empleado->direccion) }}" placeholder="Dirección de residencia" />
                </div>

                <div class="col-md-6">
                    <x-adminlte-select name="estado" label="Estado">
                        <option value="Activo" {{ old('estado', $empleado->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ old('estado', $empleado->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </x-adminlte-select>
                </div>

            </div>

            <div class="mt-3">
                <x-adminlte-button class="btn-flat" type="submit" label="Actualizar" theme="success"
                    icon="fas fa-save" />
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
                    <i class="fas fa-undo"></i> Cancelar
                </a>
            </div>
        </form>

    </x-adminlte-card>
@stop
