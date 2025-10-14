@extends('adminlte::page')

@section('title', 'MIILE')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Proveedor</h1>
@stop

@section('content')
    <x-adminlte-card>
        <form method="POST" action="{{ route('proveedores.update', $proveedores->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <x-adminlte-input name="nombre" label="Nombre" fgroup-class="col-md-6" :value="$proveedores->nombre" required />
                <x-adminlte-input name="nit" label="NIT" fgroup-class="col-md-6" :value="$proveedores->nit" />
            </div>

            <div class="row">
                <x-adminlte-input name="telefono" label="Teléfono" fgroup-class="col-md-4" :value="$proveedores->telefono" />
                <x-adminlte-input name="email" label="Correo Electrónico" type="email" fgroup-class="col-md-4" :value="$proveedores->email" />
                <x-adminlte-input name="direccion" label="Dirección" fgroup-class="col-md-4" :value="$proveedores->direccion" />
            </div>

            <div class="row">
                <x-adminlte-select name="estado" label="Estado del Proveedor" fgroup-class="col-md-3">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-list"></i>
                        </div>
                    </x-slot>
                    <option value="Activo" {{ $proveedores->estado === 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ $proveedores->estado === 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </x-adminlte-select>
            </div>

            <div class="row mt-3">
                <div class="form-group col-md-6">
                    <x-adminlte-button class="btn btn-success mr-2" type="submit" label="Guardar Cambios" theme="primary" icon="fas fa-save" />
                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary mr-2">
                        <i class="fas fa-undo"></i> Cancelar
                    </a>
                </div>
            </div>
        </form>
    </x-adminlte-card>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
@stop

@section('footer')
    <footer>
        <p>
            <img src="{{ asset('vendor/adminlte/dist/img/fralgom-foot.png') }}" alt="Logo Fralgom">
            © {{ date('Y') }} Fralgóm Ingeniería Informática. Todos los derechos reservados.
        </p>
    </footer>
@stop
