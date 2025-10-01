@extends('adminlte::page')

@section('title', 'MIILE')

@section('content_header')
<h1 class="m-0 text-dark">Gestion de Restasurantes</h1>
@stop

@section('content')
<div class="row">
    <div class="col text-right">
        <h4>Día Actual : {{ now()->format('d/m/Y') }}</h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-cyan">
            <div class="inner">
                <h3>123</h3>
                <p>Entradas</p>
            </div>
            <div class="icon">
                <i class="fas fa-sign-in-alt"></i>
            </div>
            <a href="{{ route('entradas.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>321</h3>
                <p>Empleados</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('empleados.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    <div class="col-lg-3 col-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>654</h3>
                <p>Proveedores</p>
            </div>
            <div class="icon">
                <i class="fas fa-handshake"></i>
            </div>
            <a href="{{ route('proveedores.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>654</h3>
                <p>Cuadre Factura</p>
            </div>
            <div class="icon">
                <i class="fas fa-handshake"></i>
            </div>
            <a href="{{ route('cuadres.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <br>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>654</h3>
                <p>Cierre Diario</p>
            </div>
            <div class="icon">
                <i class="fas fa-handshake"></i>
            </div>
            <a href="{{ route('cierres.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

</br>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@stop


@section('js')
@if ($message = Session::get('success'))
<script>
Swal.fire({
    title: "Operación Exitosa!",
    text: "{{ $message }}",
    timer: 2000,
    icon: "success"
});
</script>
@endif
@stop
