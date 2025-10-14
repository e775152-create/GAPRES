@extends('adminlte::page')

@section('title', 'Cierre Diario')

@section('content_header')
    <h1>Cierre Diario</h1>
@stop

@section('content')
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($cierre)
        <div class="alert alert-danger">
            El cierre del día ya se ha realizado ({{ \Carbon\Carbon::parse($cierre->fecha)->format('d/m/Y') }}).
        </div>
    @else
        <h4>Fecha actual: {{ date('d/m/Y') }}</h4>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Pedido</th>
                <th>Mesa</th>
                <th>Usuario</th>
                <th>Total</th>
                <th>Método de Pago</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->num_mesa }}</td>
                <td>{{ $pedido->usuario->name ?? '—' }}</td>
                <td>{{ number_format($pedido->total, 2) }}</td>
                <td>{{ ucfirst($pedido->metodo_pago) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Totales del día</h3>
    <ul>
        <li><strong>Total Efectivo:</strong> {{ number_format($totalEfectivo, 2) }}</li>
        <li><strong>Total Tarjeta:</strong> {{ number_format($totalTarjeta, 2) }}</li>
        <li><strong>Total General:</strong> {{ number_format($totalGeneral, 2) }}</li>
    </ul>

    @if(!$cierre)
        <form action="{{ route('cierres.cerrar') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Cerrar Día</button>
        </form>
    @endif
</div>
@endsection
