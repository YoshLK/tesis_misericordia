@extends('adminlte::page')

@section('title', 'Adultos Mayores')
<!--data table-->
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="text-center bg-red">Adultos Mayores - Inactivos</h1>
@stop

@section('content')

    <br />
    <table id="adultos" class="table table-white">
        <caption>Lista de Adultos Mayores Egresados la Misericordia</caption>
        <thead class="thead table-danger">
            <tr>
                <th>Foto</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Ingreso</th>
                <th>Salida</th>
                <th>Motivo</th>
                <th>Estancia</th>
                <th>Patologias</th>
                <th>Medicamentos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($adultosInactivos as $adulto)
                <input name="contador" value="{{ $contador = (int) $loop->iteration - 1 }}" type="hidden">
                <tr>
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $adulto->foto }}" width="100">
                    </td>
                    <td>{{ $adulto->primer_nombre }} {{ $adulto->segundo_nombre }}</td>
                    <td>{{ $adulto->primer_apellido }} {{ $adulto->segundo_apellido }}</td>
                    <td>{{ $adulto->edad }}</td>
                    <td>{{ $adulto->fecha_ingreso }}</td>
                    <td>{{ $adulto->fecha_salida }}</td>
                    <td>{{ $adulto->motivo }}</td>
                    <td>{{ $conteoTiempo[$contador] }}</td>
                    <td>
                        @if (isset($adulto->historialDatos->id))
                            @foreach ($adulto->historialDatos->patologiasDatos as $patologia)
                                <li>{{ $patologia->nombre_patologia }}</li>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        @if (isset($adulto->historialDatos->id))
                        @foreach ($adulto->historialDatos->medicamentosDatos as $medicamento)
                            <li>{{ $medicamento->nombre_medicamento }} {{ $medicamento->cantidad_medicamento }}
                                {{ $medicamento->medida_medicamento }} Frec: {{ $medicamento->frecuencia_tiempo }}
                                {{ $medicamento->frecuencia_dia }} </li>
                        @endforeach
                    @endif
                    </td>
                    <td>
                        <a href="{{ url('/general/adulto_detalle/' . $adulto->id) }}"
                            class="btn btn-xs btn-info text-light mx-1 shadow" title="Detalle">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
                        <a href="{{ url('/adulto/' . $adulto->id . '/edit') }}"
                            class="btn btn-xs btn-primary   text-light   mx-1 shadow" title="Editar">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <form action="{{ route('adulto.destroy', $adulto->id) }}" class="d-inline formulario-eliminar"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <input name="ruta" value="inactivo" type="hidden">
                            <input name="id" value="{{ $adulto->id }}" type="hidden">
                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Borrar"><i
                                    class="fa fa-lg fa-fw fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script>
        var fechaHoraActual = new Date();
        var formatoFechaHora = fechaHoraActual.toLocaleString();
        var tituloConFechaHora = 'Adultos Mayores Egresados La Misericordia: ' + formatoFechaHora;
        $(document).ready(function() {
            $('#adultos').DataTable({
                language: {
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "loadingRecords": "Cargando...",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                responsive: "true",
                dom: 'lBfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a excel',
                        className: 'btn btn-success',
                        title: tituloConFechaHora,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
                        },
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger',
                        title: tituloConFechaHora,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
                        },
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i>',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info',
                        title: tituloConFechaHora,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
                        },
                    },
                ],
            });
        });
    </script>



    @if (session('mensaje') == 'registrado')
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Adulto agregado exitosamente',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    @if (session('mensaje') == 'editado')
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Adulto Editado exitosamente',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    @if (session('mensaje') == 'eliminado')
        <script>
            Swal.fire(
                'Registro Eliminado!',
                'El adulto mayor fue eliminado.',
                'success'
            )
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e) {

            e.preventDefault();

            Swal.fire({
                title: 'Esta seguro de eliminar este registro?',
                icon: 'warning',
                color: '#c60d0d',
                text: "Advertencia no se podra recuperar la informacion eliminada!",
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#877e7e',
                confirmButtonText: 'Confirmar Eliminacion!'
            }).then((result) => {
                if (result.value) {
                    this.submit();
                }
            })

        });
    </script>

@stop
