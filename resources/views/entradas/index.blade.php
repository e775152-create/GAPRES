@extends('adminlte::page')

@section('title', 'Entradas')

@section('content_header')
<h1 class="m-0 text-dark">Administración de Entradas</h1>
@stop

@section('content')
<x-adminlte-card>
    @can('crear-entradas')
    <a class="btn btn-primary mr-2" href="{{ route('entradas.create') }}" role="button"><i class="fa fa-plus"></i> Nuevo Entrada</a>
    @endcan

    <div class="card-body">
        @php
        $config['language'] = ['url' => asset('vendor/datatables/es-CO.json')];
        //$config['paging'] = true;
        //$config['lengthMenu'] = [10, 50, 100, 500];
        @endphp
        <x-adminlte-datatable id="table1" :heads="['Id', 'Nombre', 'Estado', 'Acciones']" head-theme="dark"
            :config=$config striped hoverable with-buttons>
            @foreach ($entradas as $entrada)
            <tr>
                <td>{{ $entrada->id }}</td>
                <td>{{ $entrada->nombre }}</td>
                <td>
                    @if ($entrada->estado == "Activo")
                    <h5><span class="badge badge-success">{{ $entrada->estado }}</span></h5>
                    @elseif ($entrada->estado == "Inactivo")
                    <h5><span class="badge badge-danger">{{ $entrada->estado }}</span></h5>
                    @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('entradas.show', $entrada->id) }}" role="button">
                        <i class="far fa-eye fa-fw"></i></a>
                    @can('editar-entradas')
                    <a class="btn btn-success" href="{{ route('entradas.edit', $entrada->id) }}"
                        role="button">
                        <i class="fas fa-pencil-alt fa-fw"></i></a>
                    @endcan
                    <a class="btn btn-danger" href="{{ route('entradas.destroy', $entrada->id) }}" role="button">
                        <i class="far fa-file-pdf fa-fw"></i></a>
                    @can('borrar-entradas')
                    <form method="POST" action="{{ route('entradas.destroy', $entrada->id) }}"
                        style="display: inline;" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-warning delete-button">
                            <i class="far fa-trash-alt fa-fw"></i>
                        </button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</x-adminlte-card>
@stop

@section('footer')
<footer>
    <p><img src="{{ asset('vendor/adminlte/dist/img/fralgom-foot.png') }}" alt="Logo Fralgom"> © {{ date('Y') }} Fralgóm
        Ingeniería
        Informática. Todos los derechos reservados.</p>
</footer>
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
            title: "¿Estás seguro de Eliminar este Entrada?",
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