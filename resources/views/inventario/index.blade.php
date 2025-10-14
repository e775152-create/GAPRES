@extends('adminlte::page')

@section('title', 'Inventario')

@section('content_header')
    <h1 class="m-0 text-dark">Administración de Inventario</h1>
@stop

@section('content')
<x-adminlte-card>
    @can('crear-inventario')
        <a class="btn btn-primary mb-3" href="{{ route('inventario.create') }}">
            <i class="fa fa-plus"></i> Nuevo Insumo
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

        <x-adminlte-datatable id="table1" :heads="['ID', 'Nombre', 'Categoría', 'Cantidad', 'Unidad', 'Precio Unitario', 'Estado', 'Acciones']" head-theme="dark" :config="$config" striped hoverable with-buttons>
            @foreach ($inventario as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->categoria ?? '—' }}</td>
                    <td>{{ $item->cantidad }}</td>
                    <td>{{ $item->unidad ?? '—' }}</td>
                    <td>${{ number_format($item->precio_unitario, 0, ',', '.') }}</td>
                    <td>
                        @if ($item->estado == "Disponible")
                            <span class="badge badge-success">{{ $item->estado }}</span>
                        @else
                            <span class="badge badge-danger">{{ $item->estado }}</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('inventario.show', $item->id) }}">
                            <i class="far fa-eye"></i>
                        </a>
                        @can('editar-inventario')
                            <a class="btn btn-success btn-sm" href="{{ route('inventario.edit', $item->id) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        @endcan
                        @can('borrar-inventario')
                            <form method="POST" action="{{ route('inventario.destroy', $item->id) }}" style="display:inline;" class="delete-form">
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
            title: "¿Estás seguro de eliminar este insumo?",
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
