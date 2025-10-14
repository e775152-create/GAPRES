@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
    <h1 class="m-0 text-dark">Administración de Pedidos</h1>
@stop

@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<x-adminlte-card>
    <a class="btn btn-primary mb-3" href="{{ route('pedidos.create') }}">
        <i class="fa fa-plus"></i> Nuevo Pedido
    </a>

    @php
        $config['language'] = ['url' => asset('vendor/datatables/es-CO.json')];
    @endphp

    <x-adminlte-datatable 
        id="table1" 
        :heads="['ID', 'Mesa', 'Fecha', 'Total', 'Estado', 'Usuario', 'Acciones']"
        head-theme="dark" 
        :config="$config"
        striped 
        hoverable 
        with-buttons>

        @foreach ($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td><strong>Mesa {{ $pedido->num_mesa }}</strong></td>
                <td>{{ \Carbon\Carbon::parse($pedido->fecha)->format('d/m/Y H:i') }}</td>
                <td>${{ number_format($pedido->total, 0, ',', '.') }}</td>
                <td>
                    @if ($pedido->estado === "PENDIENTE")
                        <span class="badge badge-warning"><i class="fas fa-clock"></i> Pendiente</span>
                    @else
                        <span class="badge badge-success"><i class="fas fa-check"></i> Pagado</span>
                    @endif
                </td>
                <td>{{ $pedido->usuario->name ?? 'Sin asignar' }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('pedidos.show', $pedido->id) }}" title="Ver detalles">
                        <i class="far fa-eye"></i>
                    </a>
                    <a class="btn btn-sm btn-success" href="{{ route('pedidos.edit', $pedido->id) }}" title="Editar">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form method="POST" action="{{ route('pedidos.destroy', $pedido->id) }}" style="display:inline;" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger delete-button" title="Eliminar">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

    </x-adminlte-datatable>
</x-adminlte-card>
@stop

@section('js')
@if ($message = Session::get('success'))
<script>
Swal.fire({
    title: "Operación Exitosa",
    text: "{{ $message }}",
    timer: 2000,
    icon: "success"
});
</script>
@endif

<script>
document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', function() {
        let form = this.closest('form');
        Swal.fire({
            title: "¿Eliminar pedido?",
            text: "No podrás recuperar la información.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then(result => {
            if (result.isConfirmed) form.submit();
        });
    });
});
</script>
@stop
