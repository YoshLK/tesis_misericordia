@extends('layouts.app')
<link href="{{ asset('assets/js/DataTables/datatables.css') }}" rel="stylesheet">
<link href="{{ asset('assets/js/DataTables/datatables.min.css') }}" rel="stylesheet">

@section('title', 'Donaciones modificadas')

@section('content')

<div class="section-header">
    <h3 class="text-center">Modificaciones De Donaciones "La Misericordia"</h3>
</div>


<!--Tabla Donaciones-->
<table id="donacionesTable" class="table table-wite">
    <thead class="thead table-danger ">
        <tr>
            <th>Nombre del donador</th>
            <th>Tipo de Donacion</th>
            <th>Descripcion</th>
            <th>Usuario Modica</th>
            <th>Accion</th>
            <th>Fecha de Modificacion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($historial as $cambio)
            <tr>
                <td>{{ $cambio->donador }}</td>
                <td>{{ $cambio->tipo_donacion }}</td>
                <td>{{ $cambio->descripcion }}</td>
                <td>{{ $cambio->modifico }}</td>
                <td>{{ $cambio->operation_type }}</td>
                <td>{{ $cambio->created_at }}</td>
                <td>
                <form action="{{ route('eliminar_historial') }}" class="d-inline formulario-eliminar"
                    method="post">
                    @csrf
                    <input name="id" value="{{ $cambio->id }}" type="hidden">
                    <button type="submit" class="btn btn-outline-danger formulario" title="Borrar"><i
                            class="fa fa-lg fa-fw fa-trash"></i></button>
                </form>
                </td>
            </tr>
           
        @endforeach
    </tbody>
</table>

@endsection




@section('scripts')
<script src="{{ asset('assets/js/DataTables/datatables.min.js') }}"></script>

<script src="{{ asset('assets/js/DataTables/Buttons-2.4.2/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/DataTables/JSZip-3.10.1/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/DataTables/pdfmake-0.2.7/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/DataTables/pdfmake-0.2.7/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/Buttons-2.4.2/js/buttons.html5.min.js') }}"></script>

<script src="{{ asset('/assets/js/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#donacionesTable').DataTable({
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
                title: 'Registrado exitosamente',
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
                title: 'Edicion exitosamente',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    @if (session('mensaje') == 'eliminado')
        <script>
            Swal.fire(
                'Registro Eliminado!',
                'El registro fue eliminado.',
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
