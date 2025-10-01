@extends('adminlte::page')

@section('title', 'MIILE')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle del Pedido</h1>
@stop

@section('content')
    <x-adminlte-card>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-info-box title="Número de Mesa" text="{{ $pedido->num_mesa }}" icon="fas fa-chair" theme="info" />
            </div>
            <div class="col-md-6">
                <x-adminlte-info-box title="Fecha" text="{{ $pedido->fecha }}" icon="fas fa-calendar" theme="info" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-adminlte-info-box title="Total" text="{{ $pedido->total }}" icon="fas fa-dollar-sign" theme="info" />
            </div>
            <div class="col-md-6">
                <x-adminlte-info-box title="Estado" text="{{ $pedido->estado }}" icon="fas fa-clipboard-check" theme="info" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-adminlte-info-box title="Usuario" text="{{ $pedido->id_usuario }}" icon="fas fa-user" theme="info" />
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <a class="btn btn-secondary" href="{{ route('pedidos.index') }}"><i
                        class="fas fa-undo"></i> Regresar</a>
            </div>
        </div>
    </x-adminlte-card>
@stop
