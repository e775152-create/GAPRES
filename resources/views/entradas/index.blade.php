@extends('adminlte::page')

@section('title', 'Entradas')

@section('content_header')
    <h1 class="m-0 text-dark">Administración de Entradas</h1>
@stop

@section('content')
<x-adminlte-card>
    @can('crear-entradas')
        <a class="btn btn-primary mb-3" href="{{ route('entradas.create') }}">
            <i class="fa fa-plus"></i> Nueva Entrada
        </a>
    @endcan

    <div class="card-body">
        @php
            $config = [
                'language' => ['url' => asset('vendor/datatables/es-CO.json')],
                'responsive' => true,
                'autoWidth' => false,
            ];
        @endphp

        <x-adminlte-datatable id="table1" :heads="['ID', 'Fecha', 'Proveedor', 'Empleado', 'Total', 'Estado', 'Acciones']" head-theme="dark" :config="$config" striped hoverable with-buttons>
            @foreach ($entradas as $entrada)
                <tr>
                    <td>{{ $entrada->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($entrada->fecha)->format('d/m/Y') }}</td>
                    <td>{{ $entrada->proveedor->nombre ?? 'Sin proveedor' }}</td>
                    <td>{{ $entrada->empleado->nombre ?? 'Sin empleado' }}</td>
                    <td>${{ number_format($entrada->total, 0, ',', '.') }}</td>
                    <td>
                        @if ($entrada->estado == "Recibido")
                            <span class="badge badge-success">{{ $entrada->estado }}</span>
                        @else
                            <span class="badge badge-secondary">{{ $entrada->estado }}</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('entradas.show', $entrada->id) }}">
                            <i class="far fa-eye"></i>
                        </a>

                        @can('editar-entradas')
                            <a class="btn btn-success btn-sm" href="{{ route('entradas.edit', $entrada->id) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        @endcan

                        @can('borrar-entradas')
                            <form method="POST" action="{{ route('entradas.destroy', $entrada->id) }}" style="display:inline;" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-warning btn-sm delete-button">
                                    <i class="far fa-trash-alt"></i>
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
    <p>
        <img src="{{ asset('vendor/adminlte/dist/img/fralgom-foot.png') }}" alt="Logo Fralgom">
        © {{ date('Y') }} Fralgóm Ingeniería Informática. Todos los derechos reservados.
    </p>
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
document.querySelectorAll('.delete-button').forEach(function(button) {
    button.addEventListener('click', function() {
        var form = this.parentElement;
        Swal.fire({
            title: "¿Estás seguro de eliminar esta entrada?",
            text: "¡No se podrá recuperar la información!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "¡Sí, eliminar!"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@stop
