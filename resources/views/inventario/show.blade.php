@extends('adminlte::page')

@section('title', 'Detalle del Insumo')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle del Insumo</h1>
@stop

@section('content')
<x-adminlte-card>
    <div class="row">
        <div class="col-md-6">
            <x-adminlte-info-box title="Nombre" text="{{ $insumo->nombre }}" icon="fas fa-box" theme="info"/>
        </div>
        <div class="col-md-6">
            <x-adminlte-info-box title="Categoría" text="{{ $insumo->categoria ?? '—' }}" icon="fas fa-tags" theme="info"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-info-box title="Cantidad" text="{{ $insumo->cantidad }}" icon="fas fa-cubes" theme="info"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-info-box title="Unidad" text="{{ $insumo->unidad ?? '—' }}" icon="fas fa-weight" theme="info"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-info-box title="Precio Unitario" text="${{ number_format($insumo->precio_unitario, 0, ',', '.') }}" icon="fas fa-dollar-sign" theme="info"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-info-box title="Estado" text="{{ $insumo->estado }}" icon="fas fa-clipboard-check" theme="info"/>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <a href="{{ route('inventario.index') }}" class="btn btn-secondary">
                <i class="fas fa-undo"></i> Volver
            </a>
        </div>
    </div>
</x-adminlte-card>
@stop

@section('footer')
<footer>
    <p><img src="{{ asset('vendor/adminlte/dist/img/fralgom-foot.png') }}" alt="Logo Fralgom">
        © {{ date('Y') }} Fralgóm Ingeniería Informática. Todos los derechos reservados.</p>
</footer>
@stop
