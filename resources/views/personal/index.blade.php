@extends('layouts.app')
<link href="{{ asset('assets/js/DataTables/datatables.css') }}" rel="stylesheet">
<link href="{{ asset('assets/js/DataTables/datatables.min.css') }}" rel="stylesheet">

@section('title', 'Listado de Adultos')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Lista del personal "La Misericordia"</h3>
    </div>
    <div class="section-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <?php setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain'); ?>
                            @can('crear-personal')
                            <a href="{{ url('personal/create') }}" class="btn btn-outline-success"> + Registrar Nuevo Personal</a>
                            @endcan
                            <br />
                            <br />
                            <table id="personalsTable" class="table table-bordered table-hover text-dark">
                                <thead class="thead table-info ">
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Fecha Contratacion  </th>
                                        <th>Tiempo</th>
                                        <th>Cargo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personals as $personal)
                                    <input name="contador" value="{{ $contador = (int) $loop->iteration - 1 }}" type="hidden">
                                        <tr>
                                            <td>
                                                <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $personal->foto }}" width="100">
                                            </td>
                                            <td>{{ $personal->primer_nombre }} {{ $personal->segundo_nombre }}</td>
                                            <td>{{ $personal->primer_apellido }} {{ $personal->segundo_apellido }}</td>
                                            <td>{{$personal->telefono}}      </td>
                                            <td>{{ $personal->contrato->fecha_contratacion }}</td>
                                            <td>{{ $conteoTiempo[$contador] }}</td> 
                                            <td>{{ $personal->contrato->cargo }}</td>
                                            <td>
                                                 @can('ver-personal')
                                                <a href="{{ url('/general/personal_detalle/' . $personal->id) }}"
                                                    class="btn btn-xs btn-info text-light mx-1 shadow" title="Detalle">
                                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                                </a>
                                                @endcan
                                                @can('editar-personal')
                                                <a href="{{ url('/personal/' . $personal->id . '/edit') }}"
                                                    class="btn btn-xs btn-primary   text-light   mx-1 shadow" title="Editar">
                                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                                </a>
                                                @endcan
                                                @can('borrar-personal')
                                                <form action="{{ route('personal.destroy', $personal->id) }}" class="d-inline formulario-eliminar"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input name="ruta" type="hidden">
                                                    <input name="id" value="{{ $personal->id }}" type="hidden">
                                                    <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Borrar"><i
                                                            class="fa fa-lg fa-fw fa-trash"></i></button>
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
</section>
{{-- <button id="calcularTiempo">Calcular Tiempo</button> --}}
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
        function TiempoContrato() {
            const filas = document.querySelectorAll('#personalsTable tbody tr');

            for (let i = 0; i < filas.length; i++) {
                const fechaInicio = new Date(filas[i].querySelector('.fecha-inicio').textContent);
                const fechaFinCell = filas[i].querySelector('.fecha-fin');
                const resultadoCell = filas[i].querySelector('.resultado');

                let fechaFin;
                if (!fechaFinCell.textContent) {
                    fechaFin = new Date();
                } else {
                    fechaFin = new Date(fechaFinCell.textContent);
                }

                const diferencia = Math.abs(fechaFin - fechaInicio);
                const diasDiferencia = Math.ceil(diferencia / (1000 * 3600 * 24));
                const dias = Math.ceil(diasDiferencia)

                const anios = Math.floor(dias / 365);
                dia = dias - (anios * 365);

                const meses = Math.floor(dia / 31);
                dia -= meses * 31;

                if (anios != 0) {
                    aniosText = anios + ' Años ';
                } else {
                    aniosText = "";
                }

                if (meses != 0) {
                    mesesText = meses + ' Meses ';
                } else {
                    mesesText = "";
                }

                resultadoCell.textContent = aniosText + mesesText + dia + ' Dias' + " @ " + dias;
            }
            $('#personalsTable').DataTable().destroy();
            $('#personalsTable').DataTable({
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
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger',
                    },
                    {   
                        extend: 'print',
                        text: '<i class="fas fa-print"></i>',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info',
                    },
                ],
           });
        }
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('calcularTiempo').addEventListener('click', TiempoContrato);
        });
    </script> --}}

    <script>
        $(document).ready(function() {
           $('#personalsTable').DataTable({
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
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger',
                    },
                    {   
                        extend: 'print',
                        text: '<i class="fas fa-print"></i>',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info',
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
        title: 'Personal registrado exitosamente',
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
        title: 'Personal Editado exitosamente',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif

@if (session('mensaje') == 'eliminado')
<script>
    Swal.fire(
        'Registro Eliminado!',
        'El personal fue eliminado.',
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

@endsection
