@extends('adminlte::page')

@section('title', 'Pagos a Empleados')

@section('content_header')
    <h1>Pagos a Empleados</h1>
@stop

@section('content')
    <x-adminlte-card theme="light" title="Listado de Pagos" icon="fas fa-money-bill-wave">
        <div class="mb-3">
            <a href="{{ route('pagos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Pago
            </a>
        </div>

        <table id="tabla-pagos" class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Empleado</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                    <tr>
                        <td>{{ $pago->id }}</td>
                        <td>{{ $pago->empleado->nombre }}</td>
                        <td>${{ number_format($pago->monto, 0, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</td>
                        <td>{{ $pago->tipo_pago }}</td>
                        <td>
                            @php
                                $color = match ($pago->estado) {
                                    'Realizado' => 'success',
                                    'Pendiente' => 'warning',
                                    'Anulado' => 'danger',
                                    default => 'secondary'
                                };
                            @endphp
                            <span class="badge bg-{{ $color }}">{{ $pago->estado }}</span>
                        </td>
                        <td>
                            <a href="{{ route('pagos.show', $pago->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('pagos.edit', $pago->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este pago?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-adminlte-card>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#tabla-pagos').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
            },
            order: [[0, 'desc']]
        });
    });
</script>
@stop
