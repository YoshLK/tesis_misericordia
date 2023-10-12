@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- DATOS PERSONALES-->
                            <div class="card" style="width: 95%;">
                                <h3 class="bg-primary  px-5 text-white text-center" style="width: 100%">Datos De Personal -
                                    {{ $personal->primer_nombre }} {{ $personal->primer_apellido }}</h3>
                                <div class="row px-5 mt-2">
                                    <div class="col-5">
                                        <h5> <b class="text-dark"> Nombre:</b> {{ $personal->primer_nombre }}
                                            {{ $personal->segundo_nombre }}
                                            {{ $personal->primer_apellido }}
                                            {{ $personal->segundo_apellido }}
                                        </h5>
                                    </div>
                                    <div class="col-5">
                                        @if (isset($personal->foto))
                                            <img class="img-thumbnail img-fluid"
                                                src="{{ asset('storage') . '/' . $personal->foto }}" width="100">
                                        @endif
                                    </div>
                                    @can('editar-personal')
                                        <div class="col-2">
                                            <a href="{{ url('/personal/' . $personal->id . '/edit') }}"
                                                class="btn btn-outline-secondary">
                                                Editar
                                            </a>
                                        </div>
                                    @endcan
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-3">
                                        <b class="text-dark">
                                            <h5>DPI:
                                        </b> {{ $personal->DPI }}</span> </h5>
                                    </div>
                                    <div class="col-3">
                                        <b class="text-dark">
                                            <h5>Telefono:
                                        </b> {{ $personal->telefono }}</span> </h5>
                                    </div>
                                    <div class="col-6">
                                        <b class="text-dark">
                                            <h5>Direccion:
                                        </b> {{ $personal->direccion }}</span> </h5>
                                    </div>
                                </div>
                                <br>
                                <div class="row px-5 mt-2">
                                    <div class="col-5">
                                        <b class="text-dark">
                                            <h5>Fecha de nacimiento:
                                        </b class="text-dark"> {{ $personal->fecha_nacimiento }}</span> </h5>
                                    </div>
                                    <div class="col-3">
                                        <b class="text-dark">
                                            <h5>Edad:
                                        </b> {{ $personal->edad }}</span></h5>
                                    </div>
                                    <div class="col-4">
                                        <b class="text-dark">
                                            <h5>Estado civil:
                                        </b> {{ $personal->estado_civil }}</span></h5>
                                    </div>
                                </div>

                                <div class="row-auto px-5 py-2">
                                    <h3> <span class="fas fa-file badge bg-primary text-white rounded-pill"> Iformacion de
                                            contratacion</span> </h3>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        <b class="text-dark">
                                            <h5>Fecha de incio:
                                        </b> {{ $personal->contrato->fecha_contratacion }}</span> </h5>
                                    </div>
                                    <div class="col-6">
                                        <b class="text-dark">
                                            <h5>Titulo Academico:
                                        </b> {{ $personal->contrato->titulo }}</span></h5>
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        <b class="text-dark">
                                            <h5>Cargo:
                                        </b> {{ $personal->contrato->cargo }}</span> </h5>
                                    </div>
                                    <div class="col-6">
                                        <b class="text-dark">
                                            <h5>Salario:
                                        </b> Q. {{ $personal->contrato->salario }}.00</span></h5>
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-6 mt-2">
                                        <b class="text-dark">
                                            <h5>Aplica a impuestos:
                                        </b> {{ $personal->contrato->impuesto }}</span> </h5>
                                    </div>
                                    <div class="col-6 mt-2">
                                        @if ($personal->contrato->impuesto == 'Aplica')
                                            <b class="text-dark">
                                                <h5>Informacion Tributaria:
                                            </b> {{ $personal->contrato->sat }}</span></h5>
                                        @else
                                            <b class="text-dark">
                                                <h5>Motivo:
                                            </b> {{ $personal->contrato->sat }}</span></h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-6 mt-2">
                                        <b class="text-dark">
                                            <h5>Estado Actual:
                                        </b> {{ $personal->estado_actual }}</span></h5>
                                    </div>
                                    @if ($personal->estado_actual == 'Inactivo')
                                        <div class="col-6 mt-2">
                                            <b class="text-dark">
                                                <h5>Fecha de salida:
                                            </b>{{ $personal->contrato->fecha_salida }}</span> </h5>
                                        </div>
                                    @endif
                                </div>
                                <div class="w-100 p-1" style="background-color: #6874ec;"></div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
 <script src="{{ asset('/assets/js/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
{{--  <div class="card" style="width: 95%;">
        <h3 class="bg-primary px-5 mt-2" style="width: 100%">Horario</h3>
        <div class="col-3 ">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createHorario">
                + Agregar Horario
            </button>
            @include('horario.create')
        </div>
   <br>
    <!--Tabla horarios-->
    <br>
    @if ($personal->horarioDatos->count())
        <div class="table-responsive mt-2">
            <table class="table table-bordered  table-hover">
                <thead class="thead table-primary">
                    <tr>
                        <th>Dia</th>
                        <th>Hora de entrada</th>
                        <th>Hora de salida</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personal->horarioDatos as $horario)
                        <tr>
                            <td>{{ $horario->dia }}</td>
                            <td>{{ \Carbon\Carbon::parse($horario->inicio)->format('H:i A') }}</td>
                            <td>{{ \Carbon\Carbon::parse($horario->final)->format('H:i A') }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary formulario" data-toggle="modal"
                                    data-target="#editHorario{{ $horario->id }}">
                                    Editar
                                </button>
                                <form action="{{ route('horario.destroy', $horario->id) }}"
                                    class="d-inline formulario-eliminar" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>

                        @include('horario.edit')
                    @endforeach
                </tbody>
            </table>
            <div class="w-100 p-1" style="background-color: #007bff;"></div>
    @endif
</div>
<br> --}}


@if (session('mensaje') == 'registrado')
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Registro Agregado Exitosamente',
            showConfirmButton: true,
        })
    </script>
@endif

@if (session('mensaje') == 'editado')
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Registro Editado Exitosamente',
            showConfirmButton: true,
        })
    </script>
@endif

@if (session('mensaje') == 'eliminado')
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'error',
            title: 'Registro Eliminado!',
            showConfirmButton: true,
        })
    </script>
@endif

<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Esta seguro de eliminar el registro?',
            icon: 'warning',
            color: '#c60d0d',
            text: "Advertencia no se podra recuperar la informacion eliminada!",
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Confirmar Eliminacion!'
        }).then((result) => {
            if (result.value) {
                this.submit();
            }
        })
    });
</script>
@endsection