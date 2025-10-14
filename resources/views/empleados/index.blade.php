@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
<h1 class="m-0 text-dark">Administración de Empleados</h1>
@stop

@section('content')
<x-adminlte-card>
    @can('crear-empleados')
    <a class="btn btn-primary mr-2" href="{{ route('empleados.create') }}" role="button"><i class="fa fa-plus"></i> Nuevo Empleado</a>
    @endcan

    <div class="card-body">
        @php
        $config['language'] = ['url' => asset('vendor/datatables/es-CO.json')];
        //$config['paging'] = true;
        //$config['lengthMenu'] = [10, 50, 100, 500];
        @endphp
        <x-adminlte-datatable id="table1" :heads="['ID', 'Nombre', 'Cargo', 'Estado', 'Acciones']" head-theme="dark"
    :config="$config" striped hoverable with-buttons>
    @foreach ($empleados as $empleado)
        <tr>
            <td>{{ $empleado->id }}</td>
            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->cargo ?? 'Sin asignar' }}</td>
            <td>
                @if ($empleado->estado == 'Activo')
                    <span class="badge badge-success">{{ $empleado->estado }}</span>
                @else
                    <span class="badge badge-danger">{{ $empleado->estado }}</span>
                @endif
            </td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('empleados.show', $empleado->id) }}">
                    <i class="far fa-eye"></i>
                </a>
                <a class="btn btn-success btn-sm" href="{{ route('empleados.edit', $empleado->id) }}">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <form method="POST" action="{{ route('empleados.destroy', $empleado->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-warning btn-sm delete-button">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
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
            title: "¿Estás seguro de Eliminar este Empleado?",
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