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
        <div class="small-box bg-blue">
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
        <div class="small-box bg-orange">
            <div class="inner">
                <h3>654</h3>
                <p>Proveedores</p>
            </div>
            <div class="icon">
                <i class="fas fa-truck"></i>
            </div>
            <a href="{{ route('proveedores.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-indigo">
            <div class="inner">
                <h3>654</h3>
                <p>Inventario</p>
            </div>
            <div class="icon">
                <i class="fas fa-warehouse"></i>
            </div>
            <a href="{{ route('inventario.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-gray">
            <div class="inner">
                <h3>654</h3>
                <p>Menu</p>
            </div>
            <div class="icon">
                <i class="fas fa-utensils"></i>
            </div>
            <a href="{{ route('menus.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

<div class="col-lg-3 col-6">
        <div class="small-box bg-purple">
            <div class="inner">
                <h3>654</h3>
                <p>Pedidos</p>
            </div>
            <div class="icon">
                <i class="fas fa-receipt"></i>
            </div>
            <a href="{{ route('pedidos.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-teal">
            <div class="inner">
                <h3>654</h3>
                <p>Cuadre Factura</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <a href="{{ route('cuadres.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <br>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>654</h3>
                <p>Cierre Diario</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <a href="{{ route('cierres.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>654</h3>
                <p>Activar Cuadre</p>
            </div>
            <div class="icon">
                <i class="fas fa-toggle-on"></i>
            </div>
            <a href="{{ route('cierres.activar') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-cyan">
            <div class="inner">
                <h3>654</h3>
                <p>Gastos</p>
            </div>
            <div class="icon">
                <i class="fas fa-credit-card"></i>
            </div>
            <a href="{{ route('gastos.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>654</h3>
                <p>Pagos</p>
            </div>
            <div class="icon">
                <i class="fas fa-money-check-alt"></i>
            </div>
            <a href="{{ route('pagos.index') }}" class="small-box-footer">
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
