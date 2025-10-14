@extends('adminlte::page')

@section('title', 'Activar Cuadre')

@section('content_header')
    <h1>Activar Cuadre</h1>
@stop

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card p-4">
        <p>Esta opción permite volver a habilitar la creación de pedidos después de un cierre diario.</p>

        <form action="{{ route('cierres.activarCuadre') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">
                <i class="fas fa-power-off"></i> Activar Cuadre
            </button>
        </form>
    </div>
</div>
@stop
