@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
<h1 class="m-0 text-dark">Administración de Pedidos</h1>
@stop

@section('content')
<x-adminlte-card>
    <a class="btn btn-primary mr-2" href="{{ route('pedidos.create') }}" role="button">
        <i class="fa fa-plus"></i> Nuevo Pedido
    </a>

    <div class="card-body">
        @php
        $config['language'] = ['url' => asset('vendor/datatables/es-CO.json')];
        @endphp
        <x-adminlte-datatable id="table1" :heads="['ID', 'Mesa', 'Fecha', 'Total', 'Estado', 'Usuario', 'Acciones']"
            head-theme="dark" :config=$config striped hoverable with-buttons>
            @foreach ($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->num_mesa }}</td>
                <td>{{ $pedido->fecha }}</td>
                <td>{{ $pedido->total }}</td>
                <td>
                    @if ($pedido->estado == "PENDIENTE")
                        <h5><span class="badge badge-warning">{{ $pedido->estado }}</span></h5>
                    @else
                        <h5><span class="badge badge-success">{{ $pedido->estado }}</span></h5>
                    @endif
                </td>
                <td>{{ $pedido->id_usuario }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('pedidos.show', $pedido->id) }}" role="button">
                        <i class="far fa-eye fa-fw"></i></a>
                    <a class="btn btn-success" href="{{ route('pedidos.edit', $pedido->id) }}" role="button">
                        <i class="fas fa-pencil-alt fa-fw"></i></a>
                    <form method="POST" action="{{ route('pedidos.destroy', $pedido->id) }}"
                        style="display: inline;" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-warning delete-button">
                            <i class="far fa-trash-alt fa-fw"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</x-adminlte-card>
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

<script>
var deleteButtons = document.querySelectorAll('.delete-button');
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var form = this.parentElement;
        Swal.fire({
            title: "¿Estás seguro de eliminar este Pedido?",
            text: "¡No se podrá recuperar la información!",
            icon: "error",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "¡Sí, Eliminar!"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });
});
</script>
@stop
