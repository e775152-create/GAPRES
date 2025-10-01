@extends('adminlte::page')

@section('title', 'MIILE')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Pedido</h1>
@stop

@section('content')
    <x-adminlte-card>
        <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <x-adminlte-input name="num_mesa" label="Número de Mesa" fgroup-class="col-md-3"
                    type="number" :value="$pedido->num_mesa" required />
                <x-adminlte-input name="fecha" label="Fecha" type="datetime-local"
                    fgroup-class="col-md-4" :value="$pedido->fecha" required />
            </div>

            <div class="row">
                <x-adminlte-input name="total" label="Total" fgroup-class="col-md-3"
                    type="number" step="0.01" :value="$pedido->total" required />
                <x-adminlte-select name="estado" label="Estado" fgroup-class="col-md-3">
                    <option value="PENDIENTE" {{ $pedido->estado == 'PENDIENTE' ? 'selected' : '' }}>Pendiente</option>
                    <option value="FINALIZADO" {{ $pedido->estado == 'FINALIZADO' ? 'selected' : '' }}>Finalizado</option>
                </x-adminlte-select>
            </div>

            <div class="row">
                <x-adminlte-input name="id_usuario" label="ID Usuario" fgroup-class="col-md-3"
                    type="number" :value="$pedido->id_usuario" />
            </div>

            <div class="row">
                <x-adminlte-textarea name="observacion" label="Observación"
                    fgroup-class="col-md-6">{{ $pedido->observacion }}</x-adminlte-textarea>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <x-adminlte-button class="btn btn-success mr-2" type="submit"
                        label="Guardar Cambios" theme="primary" icon="fas fa-save" />
                    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary mr-2"><i
                            class="fas fa-undo"></i> Cancelar</a>
                </div>
            </div>
        </form>
    </x-adminlte-card>
@stop
