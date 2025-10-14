@extends('adminlte::page')

@section('title', 'Cuadre de Factura')

@section('content_header')
    <h1>📊Cuadre de Factura y Ventas</h1>
@stop

@section('content')

{{-- Resumen del día --}}
<x-adminlte-card title="Resumen del Día" theme="success" icon="fas fa-chart-pie">
    <div class="row text-center">
        <div class="col-md-4">
            <h4><i class="fas fa-money-bill-wave text-success"></i> Efectivo</h4>
            <p class="fs-4 text-success">${{ number_format($efectivoHoy, 0, ',', '.') }}</p>
        </div>
        <div class="col-md-4">
            <h4><i class="fas fa-credit-card text-primary"></i> Tarjeta</h4>
            <p class="fs-4 text-primary">${{ number_format($tarjetaHoy, 0, ',', '.') }}</p>
        </div>
        <div class="col-md-4">
            <h4><i class="fas fa-coins text-warning"></i> Total del Día</h4>
            <p class="fs-4 text-warning">${{ number_format($totalHoy, 0, ',', '.') }}</p>
        </div>
    </div>
</x-adminlte-card>

{{-- Histórico de ventas --}}
<x-adminlte-card title="Histórico de Ventas" theme="info" icon="fas fa-calendar-alt">
    <form method="GET" class="row mb-3">
        <div class="col-md-4">
            <label for="desde">Desde</label>
            <input type="date" name="desde" id="desde" value="{{ $desde }}" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="hasta">Hasta</label>
            <input type="date" name="hasta" id="hasta" value="{{ $hasta }}" class="form-control">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Buscar
            </button>
        </div>
    </form>

    {{-- Gráfica de ventas --}}
    <canvas id="ventasChart" height="120"></canvas>

    {{-- Tabla de resumen --}}
    <table class="table table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>Fecha</th>
                <th>Total Efectivo</th>
                <th>Total Tarjeta</th>
                <th>Total General</th>
            </tr>
        </thead>
        <tbody>
            @forelse($historial as $h)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($h->fecha)->format('d/m/Y') }}</td>
                    <td>${{ number_format($h->efectivo, 0, ',', '.') }}</td>
                    <td>${{ number_format($h->tarjeta, 0, ',', '.') }}</td>
                    <td>${{ number_format($h->total, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No hay registros en este rango de fechas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-adminlte-card>

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('ventasChart').getContext('2d');

    const labels = @json($historial->pluck('fecha')->map(fn($f) => \Carbon\Carbon::parse($f)->format('d/m')));
    const dataEfectivo = @json($historial->pluck('efectivo'));
    const dataTarjeta = @json($historial->pluck('tarjeta'));
    const dataTotal = @json($historial->pluck('total'));

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Efectivo',
                    data: dataEfectivo,
                    backgroundColor: 'rgba(40, 167, 69, 0.7)', // verde
                    borderColor: 'rgba(40, 167, 69, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Tarjeta',
                    data: dataTarjeta,
                    backgroundColor: 'rgba(0, 123, 255, 0.7)', // azul
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Total',
                    data: dataTotal,
                    type: 'line',
                    borderColor: 'rgba(255, 193, 7, 1)', // amarillo
                    backgroundColor: 'rgba(255, 193, 7, 0.3)',
                    tension: 0.3,
                    fill: true,
                    yAxisID: 'y'
                }
            ]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: { display: true, text: 'Total ($)' }
                }
            }
        }
    });
</script>
@stop
