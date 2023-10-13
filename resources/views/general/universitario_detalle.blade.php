@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- DATOS PERSONALES-->
                            <div class="card" style="width: 95%;">
                                <h3 class="bg-primary  px-5 text-white text-center" style="width: 100%">Datos Del Universitario -
                                    {{ $universitario->primer_nombre }} {{ $universitario->primer_apellido }}</h3>
                                <div class="row px-5 mt-2">
                                    <div class="col-5">
                                        <h5> <b class="text-dark"> Nombre:</b> {{ $universitario->primer_nombre }}
                                            {{ $universitario->segundo_nombre }}
                                            {{ $universitario->primer_apellido }}
                                            {{ $universitario->segundo_apellido }}
                                        </h5>
                                    </div>
                                   
                                        <div class="col-2">
                                            <a href="{{ url('/universitario/' . $universitario->id . '/edit') }}"
                                                class="btn btn-outline-info">
                                                Editar
                                            </a>
                                        </div>
                                  
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-3">
                                        <b class="text-dark">
                                            <h5>DPI:
                                        </b> {{ $universitario->DPI }}</span> </h5>
                                    </div>
                                    <div class="col-3">
                                        <b class="text-dark">
                                            <h5>Eddad:
                                        </b> {{ $universitario->edad }}</span> </h5>
                                    </div>
                                    <div class="col-6">
                                        <b class="text-dark">
                                            <h5>Telefono:
                                        </b> {{ $universitario->telefono }}</span> </h5>
                                    </div>
                                </div>
                                <br>
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        <b class="text-dark">
                                            <h5>Universidad:
                                        </b class="text-dark"> {{ $universitario->universidad }}</span> </h5>
                                    </div>
                                    <div class="col-6">
                                        <b class="text-dark">
                                            <h5>Carnet:
                                        </b> {{ $universitario->no_carnet }}</span></h5>
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-4">
                                        <b class="text-dark">
                                            <h5>Practica:
                                        </b> {{ $universitario->practica }}</span> </h5>
                                    </div>
                                    <div class="col-4">
                                        <b class="text-dark">
                                            <h5>Fecha Inicio:
                                        </b> {{ $universitario->fecha_incio }}</span></h5>
                                    </div>
                                    <div class="col-4">
                                        <b class="text-dark">
                                            <h5>Fecha Final:
                                        </b> {{ $universitario->fecha_final }}</span></h5>
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        <b class="text-dark">
                                            <h5>Consentimiento:
                                        </b> {{ $universitario->consentimiento }}</span> </h5>
                                    </div>
                                    <div class="col-6">
                                        @if ( $universitario->consentimiento == 'Si')
                                        <b class="text-dark">
                                            <h5>No. Consentimento:
                                        </b> {{ $universitario->no_consentimiento }}</span></h5>
                                        @else
                                        <b class="text-dark">
                                            <h5>Motivo:
                                        </b> {{ $universitario->no_consentimiento }}</span></h5>   
                                    @endif
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-6 mt-2">
                                        <b class="text-dark">
                                            <h5>Estado Actual:
                                        </b> {{ $universitario->estado_actual }}</span></h5>
                                    </div>
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