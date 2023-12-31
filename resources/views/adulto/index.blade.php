@extends('layouts.app')
<link href="{{ asset('assets/js/DataTables/datatables.css') }}" rel="stylesheet">
<link href="{{ asset('assets/js/DataTables/datatables.min.css') }}" rel="stylesheet">

@section('title', 'Listado de Adultos')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Lista adultos de Adultos Mayores "La Misericordia"</h3>
    </div>
    <div class="section-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <?php setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain'); ?>
                            @can('crear-adulto')
                            <a href="{{ url('adulto/create') }}" class="btn btn-success mb-3">
                                + Registrar Nuevo Adulto Mayor
                            </a>
                            @endcan
                            <label for="filtroEdad">Filtro por edades:</label> 
                                <label for="edadMin">Edad Mínima:</label>
                                <input type="number" id="edadMin" min="0">
                                <label for="edadMax">Edad Máxima:</label>
                                <input type="number" id="edadMax" min="0">
                            <div class="table-responsive">
                                <table id="adultos" class="table-sm table-bordered table-hover text-dark">
                                    <caption>Lista de Adultos Mayores la Misericordia</caption>
                                    <thead class="thead bg-info">
                                        <tr>
                                            <th>Foto</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Edad</th>
                                            <th>Responsable</th>
                                            <th>Ingreso</th>
                                            <th>Estancia</th>
                                            <th>Patologias</th>
                                            <th>Medicina</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($adultos as $adulto)
                                        <input name="contador" value="{{ $contador = (int) $loop->iteration - 1 }}" type="hidden">
                                        <tr>
                                            <td>
                                                <img class="img-thumbnail img-fluid"
                                                    src="{{ asset('storage') . '/' . $adulto->foto }}" width="100">
                                            </td>
                                            <td>{{ $adulto->primer_nombre }} {{ $adulto->segundo_nombre }}</td>
                                            <td>{{ $adulto->primer_apellido }} {{ $adulto->segundo_apellido }}</td>
                                            <td>{{ $adulto->edad }}</td>
                                            <td>{{$adulto->responsable->responsable.' '.$adulto->responsable->telefono.' '.$adulto->responsable->celular}}</td>
                                            <td>{{ $adulto->fecha_ingreso }}</td>
                                            <td>{{ $conteoTiempo[$contador] }}</td>
                                            <td>
                                                @foreach ($adulto->patologiasDatos as $patologia)
                                                <li>{{ $patologia->nombre_patologia }}</li>
                                                @endforeach
                                            </td>
                                            <td>
                                                 @foreach ($adulto->medicamentosDatos as $medicamento)
                                                <li>{{ $medicamento->nombre_medicamento.' '.$medicamento->cantidad_medicamento.' '.$medicamento->medida_medicamento.' Freq: '.$medicamento->frecuencia_tiempo.' '.$medicamento->frecuencia_dia }}
                                                </li>
                                                @endforeach
                                            </td>
                                            <td>
                                                @can('ver-adulto')
                                                <a href="{{ url('/general/adulto_detalle/' . $adulto->id) }}"
                                                    class="btn btn-info text-light mx-1 shadow" title="Detalle">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @endcan
                                                @can('editar-adulto')
                                                <a href="{{ url('/adulto/' . $adulto->id . '/edit') }}"
                                                    class="btn btn-primary text-light mx-1 shadow" title="Editar">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                @endcan
                                                @can('borrar-adulto')
                                                <form action="{{ route('adulto.destroy', $adulto->id) }}"
                                                    class="d-inline formulario-eliminar" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input name="ruta" type="hidden">
                                                    <input name="id" value="{{ $adulto->id }}" type="hidden">
                                                    <button type="submit" class="btn btn-default text-danger mx-1 shadow"
                                                        title="Borrar"><i class="fa fa-trash"></i></button>
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('scripts')
    <script src="{{ asset('assets/js/DataTables/datatables.min.js') }}"></script>

    <script src="{{ asset('assets/js/DataTables/Buttons-2.4.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/DataTables/JSZip-3.10.1/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/DataTables/pdfmake-0.2.7/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/DataTables/pdfmake-0.2.7/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/Buttons-2.4.2/js/buttons.html5.min.js') }}"></script>

    <script src="{{ asset('/assets/js/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    {{-- <script>
        var fechaHoraActual = new Date();
        var formatoFechaHora = fechaHoraActual.toLocaleString();
        var tituloConFechaHora = 'Adultos Mayores La Misericordia: ' + formatoFechaHora;
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
                dom: 'iBfrtlp',
                buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a excel',
                        className: 'btn btn-success',
                        title: tituloConFechaHora,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8],
                        },
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger',
                        title: tituloConFechaHora,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8],
                        },
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i>',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info',
                        title: tituloConFechaHora,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8],
                        },
                    },
                ],
            });
        });
    </script>  --}}

<script>
   $(document).ready(function() {
    var fechaHoraActual = new Date();
    var formatoFechaHora = fechaHoraActual.toLocaleString();
    var tituloConFechaHora = 'Adultos Mayores La Misericordia: ' + formatoFechaHora;

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
        responsive: true,
        dom: 'lBfrtip', // Se ha eliminado "i" para espacio entre botones
        buttons: [{
            extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a excel',
                        className: 'btn btn-success',
                        title: tituloConFechaHora,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8],
                        },
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger',
                        title: tituloConFechaHora,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8],
                        },
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i>',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info',
                        title: tituloConFechaHora,
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8],
                        },
        }],
        columnDefs: [{
            type: 'numeric', // Tipo numérico
            targets: [3], // Índice de la columna de edad (cambia según tu configuración)
        }],
    });

    // Configurar el filtro por rango de edades
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = $('#edadMin').val(); // Valor mínimo del campo de entrada
            var max = $('#edadMax').val(); // Valor máximo del campo de entrada
            var age = data[3]; // Índice de la columna de edad (cambia según tu configuración)

            if ((min === '' && max === '') ||
                (min === '' && age <= max) ||
                (min <= age && '' === max) ||
                (min <= age && age <= max)) {
                return true;
            }
            return false;
        }
    );

    // Detectar cambios en los campos de entrada y aplicar el filtro
    $('#edadMin, #edadMax').on('change', function() {
        $('#adultos').DataTable().draw();
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

    @if (session('mensaje') == 'error')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error de entrada de datos',

            })
        </script>
    @endif
@endsection
