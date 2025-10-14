@extends('adminlte::page')

@section('title', 'Gastos')

@section('content_header')
<h1 class="m-0 text-dark">Administración de Gastos</h1>
@stop

@section('content')
<x-adminlte-card>
    @can('crear-gastos')
    <a class="btn btn-primary mb-3" href="{{ route('gastos.create') }}">
        <i class="fa fa-plus"></i> Nuevo Gasto
    </a>
    @endcan

    @php
        $config['language'] = ['url' => asset('vendor/datatables/es-CO.json')];
    @endphp

    <x-adminlte-datatable id="table1" :heads="['ID', 'Concepto', 'Monto', 'Fecha', 'Empleado', 'Acciones']"
        head-theme="dark" :config="$config" striped hoverable with-buttons>
        @foreach ($gastos as $gasto)
        <tr>
            <td>{{ $gasto->id }}</td>
            <td>{{ $gasto->concepto }}</td>
            <td>${{ number_format($gasto->monto, 0, ',', '.') }}</td>
            <td>{{ \Carbon\Carbon::parse($gasto->fecha)->format('d/m/Y') }}</td>
            <td>{{ $gasto->empleado->nombre ?? 'No asignado' }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('gastos.show', $gasto->id) }}">
                    <i class="far fa-eye"></i>
                </a>
                @can('editar-gastos')
                <a class="btn btn-success" href="{{ route('gastos.edit', $gasto->id) }}">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                @endcan
                @can('borrar-gastos')
                <form method="POST" action="{{ route('gastos.destroy', $gasto->id) }}" style="display:inline;"
                    class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-warning delete-button">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </x-adminlte-datatable>
</x-adminlte-card>
@stop

@section('footer')
<footer>
    <p><img src="{{ asset('vendor/adminlte/dist/img/fralgom-foot.png') }}" alt="Logo Fralgom">
        © {{ date('Y') }} Fralgóm Ingeniería Informática. Todos los derechos reservados.</p>
</footer>
@stop

@section('js')
@if ($message = Session::get('success'))
<script>
Swal.fire({
    title: "Operación Exitosa!",
    text: "{{ $message }}",
    icon: "success",
    timer: 2000
});
</script>
@endif

<script>
document.querySelectorAll('.delete-button').forEach(btn => {
    btn.addEventListener('click', function() {
        const form = this.closest('form');
        Swal.fire({
            title: "¿Eliminar gasto?",
            text: "No se podrá recuperar la información.",
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
