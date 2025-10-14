@extends('adminlte::page')

@section('title', 'MIILE')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Proveedor</h1>
@stop

@section('content')
    <x-adminlte-card>
        <form method="POST" action="{{ route('proveedores.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del Proveedor" fgroup-class="col-md-6" required />
                <x-adminlte-input name="nit" label="NIT" placeholder="Número de identificación" fgroup-class="col-md-6" />
            </div>

            <div class="row">
                <x-adminlte-input name="telefono" label="Teléfono" placeholder="Ej: 3001234567" fgroup-class="col-md-4" />
                <x-adminlte-input name="email" label="Correo Electrónico" type="email" placeholder="correo@ejemplo.com" fgroup-class="col-md-4" />
                <x-adminlte-input name="direccion" label="Dirección" placeholder="Dirección del proveedor" fgroup-class="col-md-4" />
            </div>

            <div class="row">
                <x-adminlte-select name="estado" label="Estado del Proveedor" fgroup-class="col-md-3">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-list"></i>
                        </div>
                    </x-slot>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </x-adminlte-select>
            </div>

            <div class="row mt-3">
                <div class="form-group col-md-6">
                    <x-adminlte-button class="btn btn-primary mr-2" type="submit" label="Guardar Proveedor" theme="primary" icon="fas fa-save" />
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
