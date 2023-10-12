@extends('layouts.app')

@section('title', 'Ficha Adulto')

@section('content')
@can('ver-adulto')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Lista adultos de Adultos Mayores</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- DATOS PERSONALES ADULTO-->
                            <div class="card" style="width: 100%;">
                                <h3 class="color-logo  px-5 text-white text-center" style="width: 100%">Ficha de ingreso Del Adulto Mayor -
                                    {{ $adulto->primer_nombre }} {{ $adulto->primer_apellido }}</h3>

                                <div class="row px-5 mt-2">
                                    <div class="col-5">
                                        <h5> <b class="text-dark"> Fecha de ingreso:</b> {{ $adulto->fecha_ingreso }}
                                        </h5>
                                    </div>
                                    <div class="col-5">
                                        <h5> <b class="text-dark">Recibe:</b> {{ $adulto->recibe }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-5">
                                        <h5> <b class="text-dark"> Nombre:</b> {{ $adulto->primer_nombre }}
                                            {{ $adulto->segundo_nombre }}
                                            {{ $adulto->primer_apellido }}
                                            {{ $adulto->segundo_apellido }}
                                        </h5>
                                    </div>
                                    <div class="col-5">
                                        @if (isset($adulto->foto))
                                            <b class="text-dark">Foto:</b>
                                            <img class="img-thumbnail img-fluid"
                                                src="{{ asset('storage') . '/' . $adulto->foto }}" width="100">
                                        @endif
                                    </div>
                                    @can('editar-adulto')
                                    <div class="col-2">
                                        <a href="{{ url('/adulto/' . $adulto->id . '/edit') }}"
                                            class="btn btn-outline-dark">
                                            Editar
                                        </a>
                                    </div>
                                    @endcan
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-3">
                                        <h5>
                                            <b class="text-dark">Edad:
                                            </b> {{ $adulto->edad }} años</span>
                                        </h5>
                                    </div>
                                    <div class="col-5">
                                        <h5> <b class="text-dark">Fecha de Nacimiento:
                                            </b>{{ $adulto->fecha_nacimiento }} </span> </h5>
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        <h5> <b class="text-dark">Cedula/DPI:
                                            </b> {{ $adulto->DPI }}</span> </h5>
                                    </div>
                                    <div class="col-6">
                                        @if (empty($adulto->registro))
                                            <b>
                                                <h5 class="text-warning"> Registro no llenado
                                            </b></h5>
                                        @else
                                            <h5><b class="text-dark">Registro:</b> {{ $adulto->registro }}</h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-9">
                                        <h5>
                                            <b class="text-dark"> Lugar de Origen:
                                            </b> {{ $adulto->lugar_origen }}</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-9">
                                        @if (empty($adulto->domicilio))
                                            <b>
                                                <h5 class="text-warning"> Sin Domicilio
                                            </b></h5>
                                        @else
                                            <h5><b class="text-dark">Domicilio:</b> {{ $adulto->domicilio }}</h5>
                                        @endif
                                    </div>
                                </div>

                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        @if (empty($adulto->iggs) | ($adulto->iggs == 'No'))
                                            <h5><b class="text-dark">IGGS :</b>No</h5>
                                        @else
                                            <h5><b class="text-dark">IGGS:</b> {{ $adulto->iggs_identificacion }}</h5>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        @if (empty($adulto->cuota) | ($adulto->cuota == 'No'))
                                            <h5><b class="text-dark">Cuota :</b>No aporta</h5>
                                        @else
                                            <h5><b class="text-dark">Cuota: </b>Q. {{ $adulto->cuota_monto }}.00</h5>
                                        @endif
                                    </div>
                                </div>

                                <!-- DATOS DEL RESPONSABLE-->
                                <h4 class="color-logo px-5 text-white text-center mt-4  " style="width: 50%">Datos del
                                    Responsable</h4>
                                <div class="row px-5 mt-2">
                                    <div class="col-4">
                                        <h5>
                                            <b class="text-dark">Referido Por:
                                            </b> {{ $adulto->responsable->procedencia }}</span>
                                        </h5>
                                    </div>
                                    <div class="col-8">
                                        <h5>
                                            <b class="text-dark">Responsable:</b>
                                            {{ $adulto->responsable->responsable }}</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        <h5>
                                            <b class="text-dark">DPI encargado (a):
                                            </b> {{ $adulto->responsable->dpi_encargado }}</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        @if (empty($adulto->responsable->telefono))
                                            <b>
                                                <h5 class="text-warning">Sin Telefono de Domicilio
                                            </b></h5>
                                        @else
                                            <h5><b class="text-dark">Telefono Domicilio:</b>
                                                {{ $adulto->responsable->telefono }}</h5>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <h5>
                                            <b class="text-dark">Celular:</b>
                                            {{ $adulto->responsable->celular }}</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-12">
                                        <h5>
                                            <b class="text-dark">Domicilio Encargado:
                                            </b> {{ $adulto->responsable->direccion }}</span>
                                        </h5>
                                    </div>
                                </div>

                                <!--CONCENTIMIENTO Y APROBACION-->
                                <h4 class="color-logo px-5 text-white text-center mt-4" style="width: 50%">Consentimiento y
                                    Aprobación</h4>
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        <h6>
                                            <b class="text-dark">Firma Contrato de Ingreso Parientes:
                                            </b>
                                            @if ($adulto->firma_pariente == 'Si')
                                                {{ $adulto->firma_pariente }}</span>
                                        </h6>
                                    @else
                                        <span class="text-warning">{{ $adulto->firma_pariente }}</span></h6>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <h6>
                                            <b class="text-dark">Paciente esta de acuerdo con ingresar al Hogar:
                                            </b>
                                            @if ($adulto->firma_pariente == 'Si')
                                                {{ $adulto->firma_pariente }}</span>
                                        </h6>
                                    @else
                                        <span class="text-warning">{{ $adulto->firma_pariente }}</span></h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        <h5>
                                            <b class="text-dark">Motivo de ingreso:
                                            </b> {{ $adulto->motivo_ingreso }}</span>
                                        </h5>
                                    </div>
                                </div>
                                <br>

                                <!--CONDICION FISICA DE INGRESO-->
                                <h4 class="color-logo px-5 text-white text-center mt-4" style="width: 50%">Condiciones
                                    Físicas de Ingreso</h4>
                                <div class="row px-5 mt-2">
                                    <div class="col-4">
                                        @if (isset($adulto->condicionFisica->conciente))
                                            <h5><b class="text-dark">Conciente:</b>
                                                {{ $adulto->condicionFisica->conciente }}</h5>
                                            {{--  @else
                                <h5><b>Conciente:¿-?</b></h5> --}}
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        @if (isset($adulto->condicionFisica->camina))
                                            <h5><b class="text-dark">Camina:</b> {{ $adulto->condicionFisica->camina }}
                                            </h5>
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        @if (isset($adulto->condicionFisica->habla))
                                            <h5><b class="text-dark">Habla:</b> {{ $adulto->condicionFisica->habla }}</h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="row px-5 mt-2">

                                    <div class="col-6">
                                        @if (isset($adulto->condicionFisica->vidente))
                                            <h5><b class="text-dark">Vidente:</b> {{ $adulto->condicionFisica->vidente }}
                                            </h5>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        @if (isset($adulto->condicionFisica->dificultad_motora))
                                            <h5><b class="text-dark">Silla de Ruedas u Otros:</b>
                                                {{ $adulto->condicionFisica->dificultad_motora }}</h5>
                                        @endif
                                    </div>
                                </div>

                                <div class="row px-5 mt-2">
                                    <div class="col-12">
                                        @if (isset($adulto->condicionFisica->observaciones))
                                            <h5><b class="text-dark">Observaciones:</b>
                                                {{ $adulto->condicionFisica->observaciones }}</h5>
                                        @endif
                                    </div>
                                </div>

                                <!--DATOS ADICIONALES FICHA -->
                                <h4 class="color-logo px-5 text-white text-center mt-4" style="width: 100%">Ficha De
                                    Ingreso</h4>
                                <!--Enfermedad / Medicamento-->
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                    @if ((isset($adulto->ficha->enfermedad) && $adulto->ficha->enfermedad == 'Si') || $adulto->ficha->enfermedad == 'No')
                                        <h6>
                                            <b class="text-dark">Padece alguna Enfermedad:
                                            </b>{{ $adulto->ficha->enfermedad }}:
                                            {{ $adulto->ficha->enfermedad_nombre }}</span>
                                        </h6>
                                    @endif
                                    </div>
                                    <div class="col-6">
                                        @if ((isset($adulto->ficha->medicamento) && $adulto->ficha->medicamento == 'Si') || $adulto->ficha->medicamento == 'No')
                                        <h6>
                                            <b class="text-dark">Toma algún medicamento:
                                            </b>{{ $adulto->ficha->medicamento }}:
                                            {{ $adulto->ficha->medicamento_nombre }}</span>
                                        </h6>
                                    @endif
                                    </div>
                                </div>
                                <!--Duerme / tic o mania-->
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        @if ((isset($adulto->ficha->duerme) && $adulto->ficha->duerme == 'Si') || $adulto->ficha->duerme == 'No')
                                        <h6>
                                            <b class="text-dark">Duerme por las noches:
                                            </b>{{ $adulto->ficha->duerme }}</span>
                                        </h6>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        @if ((isset($adulto->ficha->tic) && $adulto->ficha->tic == 'Si') || $adulto->ficha->tic == 'No')
                                        <h6>
                                            <b class="text-dark">Tiene algun tic o manía:
                                            </b>{{ $adulto->ficha->tic }}:
                                            {{ $adulto->ficha->tic_nombre }}</span>
                                        </h6>
                                        @endif
                                    </div>
                                </div>

                                 <!--Necesidades / Operacion-->
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        @if ((isset($adulto->ficha->necesidades) && $adulto->ficha->necesidades == 'Si') || $adulto->ficha->necesidades == 'No')
                                        <h6>
                                            <b class="text-dark">Puede realizar sus necesidades Fisiologicas Solo:
                                            </b>{{ $adulto->ficha->necesidades }}</span>
                                        </h6>
                                        @endif
                                    </div>
                                    <div class="col-6">  
                                        @if ((isset($adulto->ficha->operacion) && $adulto->ficha->operacion == 'Si') || $adulto->ficha->operacion == 'No')
                                        <h6>
                                            <b class="text-dark">Tiene alguna Operacion:
                                            </b>{{ $adulto->ficha->operacion }}:
                                            {{ $adulto->ficha->operacion_nombre }}</span>
                                        </h6>
                                        @endif
                                    </div>
                                </div>
                               
                                <!--Vicios-->
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        @if ((isset($adulto->ficha->alchol) && $adulto->ficha->alchol == 'Si') || $adulto->ficha->alchol == 'No')
                                        <h6>
                                            <b class="text-dark">Toma Bebidas alcohólicas:
                                            </b>{{ $adulto->ficha->alchol }}
                                    @endif
                                    </div>
                                    <div class="col-6">
                                        @if ((isset($adulto->ficha->fuma) && $adulto->ficha->fuma == 'Si') || $adulto->ficha->fuma == 'No')
                                            <h6>
                                                <b class="text-dark">Fuma:
                                                </b>{{ $adulto->ficha->fuma }}
                                        @endif
                                    </div>
                                </div>


                                <!--ALergias comida/ medicina-->
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        @if ((isset($adulto->ficha->alergia_m) && $adulto->ficha->alergia_m == 'Si') || $adulto->ficha->alergia_m == 'No')
                                        <h6>
                                            <b class="text-dark">Alergico a alguna medicina:
                                            </b>{{ $adulto->ficha->alergia_m }}:
                                            {{ $adulto->ficha->alergia_medicina }}</span>
                                        </h6>
                                    @endif
                                    </div>
                                    <div class="col-6">
                                        @if ((isset($adulto->ficha->alergia_c) && $adulto->ficha->alergia_c == 'Si') || $adulto->ficha->alergia_c == 'No')
                                        <h6>
                                            <b class="text-dark">Alergico a alguna comida:
                                            </b>{{ $adulto->ficha->alergia_c }}:
                                            {{ $adulto->ficha->alergia_comida }}</span>
                                        </h6>
                                    @endif
                                    </div>
                                </div>

                                <!--fractura / cicatriz-->
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        @if ((isset($adulto->ficha->fractura) && $adulto->ficha->fractura == 'Si') || $adulto->ficha->fractura == 'No')
                                        <h6>
                                            <b class="text-dark">Ha tenido alguna fractura:
                                            </b>{{ $adulto->ficha->fractura }}:
                                            {{ $adulto->ficha->fractura_donde }}</span>
                                        </h6>
                                    @endif
                                    </div>
                                    <div class="col-6">
                                        @if ((isset($adulto->ficha->cicatriz) && $adulto->ficha->cicatriz == 'Si') || $adulto->ficha->cicatriz == 'No')
                                        <h6>
                                            <b class="text-dark">Tiene alguna cicatriz:
                                            </b>{{ $adulto->ficha->cicatriz }}:
                                            {{ $adulto->ficha->cicatriz_donde }}</span>
                                        </h6>
                                    @endif
                                    </div>
                                </div>
                                
                                <!--tatuaje / herida -->
                                <div class="row px-5 mt-2">
                                    <div class="col-6">
                                        @if ((isset($adulto->ficha->tatuaje) && $adulto->ficha->tatuaje == 'Si') || $adulto->ficha->tatuaje == 'No')
                                        <h6>
                                            <b class="text-dark">Tiene algun tatuaje:
                                            </b>{{ $adulto->ficha->tatuaje }}:
                                            {{ $adulto->ficha->tatuaje_donde }}</span>
                                        </h6>
                                    @endif
                                    </div>
                                    <div class="col-6">
                                        @if ((isset($adulto->ficha->herida) && $adulto->ficha->herida == 'Si') || $adulto->ficha->herida == 'No')
                                        <h6>
                                            <b class="text-dark">Tiene alguna herida:
                                            </b>{{ $adulto->ficha->herida }}:
                                            {{ $adulto->ficha->herida_donde }}</span>
                                        </h6>
                                    @endif
                                    </div>
                                </div>
                                
                                <!--orientado-->
                                <div class="row px-5 mt-2">
                                    <div class="col-4 ">
                                        @if ((isset($adulto->ficha->fecha) && $adulto->ficha->fecha == 'Si') || $adulto->ficha->fecha == 'No')
                                            <h6>
                                                <b class="text-dark">Orientado en Fecha:
                                                </b>{{ $adulto->ficha->fecha }}
                                        @endif
                                    </div>
                                    <div class="col-4 ">
                                        @if ((isset($adulto->ficha->nombre) && $adulto->ficha->nombre == 'Si') || $adulto->ficha->nombre == 'No')
                                            <h6>
                                                <b class="text-dark">Orientado en Nombre:
                                                </b>{{ $adulto->ficha->nombre }}
                                        @endif
                                    </div>
                                    <div class="col-4 ">
                                        @if ((isset($adulto->ficha->lugar) && $adulto->ficha->lugar == 'Si') || $adulto->ficha->lugar == 'No')
                                            <h6>
                                                <b class="text-dark">Orientado en Lugar:
                                                </b>{{ $adulto->ficha->lugar }}
                                        @endif
                                    </div>
                                </div>

                                <!--Estado en el sistema-->
                                <div class="row px-5 mt-2">
                                    <div class="col-12">
                                        <b>
                                            <h5 class="color-logo text-white text-center">Estado:
                                        </b> {{ $adulto->estado_actual }}</span> </h5>
                                    </div>
                                    @if ($adulto->estado_actual == 'Inactivo')
                                        <div class="row px-5 mt-2">
                                            <div class="col-5">
                                                <b>
                                                    <h5>Fecha de salida:
                                                </b>{{ $adulto->fecha_salida }}</span> </h5>
                                            </div>
                                            <div class="col-5">
                                                <b>
                                                    <h5>Motivo:
                                                </b>{{ $adulto->motivo }}</span> </h5>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="w-100 p-1" style="background-color: #8e0432;"></div>
                            <br>
                        </div>
                        <!-- card finaliz ficha del adulto-->
                    </div>
                </div>
            </div>
        </div>
</section>

   <div class="card text-left">
     <div class="card-body">
       <h4 class="card-title">
        <p class="text-white bg-primary px-5">REFERENCIAS</p></h4>
        <div class="row">
            <div class="col-3">
                @can('crear-adulto')
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createReferencia">
                    + Añadir Referencia
                </button>
                @include('referencia.create')
                @endcan
            </div>
        </div>
        <br>
        @if ($adulto->referenciaDatos->count())
            
            <div class="table-responsive">
                <table class="table table-bordered  table-hover">
                    <thead class="thead table-primary">
                        <tr>
                            <th>Nombre de la referencia:</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adulto->referenciaDatos as $referencia)
                            <tr>
                                <td>{{ $referencia->nombre_referencia }}</td>
                                <td>{{ $referencia->telefono }}</td>
                                <td>{{ $referencia->direccion }}</td>
                                <td>
                                    @can('editar-adulto')
                                    <button type="button" class="btn btn-outline-primary formulario" data-toggle="modal"
                                        data-target="#editReferencia{{ $referencia->id }}">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    @endcan
                                    @can('borrar-adulto')
                                    <form action="{{ route('referencia.destroy', $referencia->id) }}"
                                        class="d-inline formulario-eliminar" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            <!--modal editar--->
                            @include('referencia.edit')
                        @endforeach
                    </tbody>
                </table>
                <div class="w-100 p-1" style="background-color: #007bff;"></div>
            </div>
        @endif
    
   </div>
</div>


<div class="card" style="width: 100%;">
    <h3 class="bg-info text-white px-5" style="width: 100%">MEDIDAS CORPORALES</h3>
    <div class="card-body"> 
    @if (empty($adulto->historialDatos->id))
    @can('crear-adulto')
    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#createHistorial">
        + Agregar - Ficha Medidas Corporales
    </button>
    @include('historial.create')
    @endcan
    @endif     

<!-- ficha medidas corporales-->
@if (isset($adulto->historialDatos->id))
    
    <div class="row px-5 mt-2">
        <div class="col-3">
            <h5>
                <b>Peso:</b>
                {{ $adulto->historialDatos->peso }} kg
            </h5>
        </div>
        <div class="col-3">
            <h5>
                <b> Altura:</b>
                {{ $adulto->historialDatos->altura }} mts
            </h5>
        </div>
        <div class="col-4">
            <h5>
                <b> Indice Masa Corporal:</b>
                {{ $adulto->historialDatos->indice }}
            </h5>
        </div>
        <div class="col-2">
            @can('editar-adulto')
            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                data-target="#editHistorial{{ $adulto->historialDatos->id }}">
                <i class="fa fa-pen">Editar Ficha Corporal</i>
            </button>
            @include('historial.edit')
            @endcan
        </div>
    </div>
    <h5 class="bg-info px-5 text-center" style="width: 20%"><b>Tallas</b></h5>
    <div class="row px-5">
        <div class="col-4">
            <h5>
                <b>Camisa:</b>
                {{ $adulto->historialDatos->tronco }}
            </h5>
        </div>
        <div class="col-4">
            <h5>
                <b>Patanlon:</b>
                {{ $adulto->historialDatos->piernas }}
            </h5>
        </div>
        <div class="col-4">
            <h5>
                <b>Calzado:</b>
                {{ $adulto->historialDatos->calzado }}
            </h5>
        </div>
    </div>
    @if (isset($adulto->historialDatos->dificultad_motora))
        <h5 class="bg-info px-5 text-center" style="width: 25%"><b>Dificultad Motora</b></h5>
        <div class="row px-5">
            <h5>
                {{ $adulto->historialDatos->dificultad_motora }}
            </h5>
        </div>
    @endif
    <br>
    <div class="w-100 p-1" style="background-color: #17a2b8;"></div>
@endif
</div>
</div>
<!-- Ficha patologia-->
<div class="card card-success" style="width: 100%;">
    <h3><p class="text-white bg-success px-5">PATOLOGIAS</p></h3>
    <div class="col-4">
        @can('crear-adulto')
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createPatologia">
            + Agregar - Patologias
        </button>
        @include('patologia.create')
        @endcan
    </div>
    <div class="mt-4"></div>
        @if ($adulto->patologiasDatos->count())
            <div class="table table-auto">
                <table class="table table-bordered  table-hover">
                    <thead class="thead table-success">
                        <tr>
                            <th>Patologia:</th>
                            <th>Fecha de diagnostico:</th>
                            <th>Gravedad:</th>
                            <th>Tratamiento:</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adulto->patologiasDatos as $patologia)
                            <tr>
                                <input name="contador" value="{{ $contadorPatologia = (int) $loop->iteration - 1 }}"
                                    type="hidden">
                                <td>{{ $patologia->nombre_patologia }}</td>
                                <td>{{ $patologia->fecha_diagnostico }}</td>
                                <td>{{ $patologia->gravedad }}</td>
                                <td>{{ $patologia->tratamiento_actual }}</td>
                                <td>
                                    @can('ver-adulto')
                                    <button type="button" class="btn btn-success formulario" data-toggle="modal"
                                        data-target="#detallePatologia{{ $contadorPatologia }}">
                                        Observaciones
                                    </button>
                                    @endcan
                                    @can('editar-adulto')
                                    <button type="button" class="btn btn-outline-success formulario" data-toggle="modal"
                                        data-target="#editPatologia{{ $patologia->id }}">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    @endcan
                                    @can('borrar-adulto')
                                    <form method="POST" action="{{ route('eliminar_patologia') }}"
                                        class="d-inline formulario-eliminar">
                                        @csrf
                                        <input name="id" value="{{ $patologia->id }}" type="hidden">
                                        <input name="ruta" value="{{ $adulto->id }}" type="hidden">
                                        <button type="submit" class="btn btn-outline-danger"
                                            data-toggle="modal"><i class="fa fa-trash"></i></button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @include('patologia.edit') 
                            @include('patologia.detalle')
                        @endforeach
                    </tbody>
                </table>
                <div class="w-100 p-1" style="background-color: #28a745;"></div>
            </div>
            @endif
</div>




<!-- Ficha MEDICAMENTOS-->
<div class="card card-secondary" style="width: 100%;">
    <h3><p class="bg-secondary px-5">MEDICAMENTOS</p></h3>
    <div class="col-4">
        @can('crear-adulto')
        <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#createMedicamento">
            + Añadir Medicamento
        </button>
        @endcan
        <div class="mt-4"></div>
        @include('medicamento.create')
    </div>
    @if ($adulto->medicamentosDatos->count())
        <table id="medicamentos" class="table-sm table-bordered table-hover">
            <thead class="thead table-secondary">
                <tr>
                    <th>Medicamento</th>
                    <th>Dosis</th>
                    <th>Frecuencia</th>
                    <th>Administracion</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>Conteo Dias</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adulto->medicamentosDatos as $medicamento)
                    <tr>
                        <input name="contador" value="{{ $contadorMedicamento = (int) $loop->iteration - 1 }}"
                            type="hidden">
                        <td>{{ $medicamento->nombre_medicamento }}</td>
                        <td>{{ $medicamento->cantidad_medicamento }} {{ $medicamento->medida_medicamento }}</td>
                        <td>{{ $medicamento->frecuencia_tiempo }} {{ $medicamento->frecuencia_dia }}</td>
                        <td>{{ $medicamento->via_administracion }}</td>
                        <td class="fecha-inicio">{{ $medicamento->fecha_inicio }}</td>
                        <td class="fecha-fin">{{ $medicamento->fecha_fin }}</td>
                        <td class="resultado"></td>
                        <td>
                            @can('ver-adulto')
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#detalleMedicamento{{ $contadorMedicamento }}">
                                Notas
                            </button>
                            @endcan
                            @can('editar-adulto')
                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                data-target="#editMedicamento{{ $medicamento->id }}">
                                <i class="fa fa-pen"></i>
                            </button>
                            @endcan
                            @can('borrar-adulto')
                            <form method="POST" action="{{ route('eliminar_medicamento') }}"
                                class="d-inline formulario-eliminar">
                                @csrf
                                <input name="id" value="{{ $medicamento->id }}" type="hidden">
                                <input name="ruta" value="{{ $adulto->id }}" type="hidden">
                                <button type="submit" class="btn btn-outline-danger"
                                    data-toggle="modal"><i class="fa fa-trash"></i></button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @include('medicamento.edit')
                    @include('medicamento.detalle')
                @endforeach
            </tbody>
         
        </table>
        <div class="card-body ml-4">
            @can('ver-adulto')
            <button type="button" class="btn btn-info float-right" id="calcularDiasMedicamento">Calcular Dias de Medicación</button>
            @endcan
        </div>
    
    <div class="w-100 p-1" style="background-color: #6c757d;"></div>
@endif
</div>

@endcan
@endsection




 @section('scripts')
 <script src="{{ asset('/assets/js/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script>
        function DiasMedicamento() {
            const filas = document.querySelectorAll('#medicamentos tbody tr');

            for (let i = 0; i < filas.length; i++) {
                const fechaInicio = new Date(filas[i].querySelector('.fecha-inicio').textContent);
                const fechaFinCell = filas[i].querySelector('.fecha-fin');
                const resultadoCell = filas[i].querySelector('.resultado');

                let fechaFin;
                let plus;

                if (!fechaFinCell.textContent) {
                    fechaFin = new Date();
                    plus = 0;
                } else {
                    fechaFin = new Date(fechaFinCell.textContent);
                    plus = 1;
                }

                const diferencia = Math.abs(fechaFin - fechaInicio);
                const diasDiferencia = Math.ceil(diferencia / (1000 * 3600 * 24));
                const dias = Math.ceil(diasDiferencia + plus)
                resultadoCell.textContent = dias + ' días';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('calcularDiasMedicamento').addEventListener('click', DiasMedicamento);
        });
    </script>

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

<style>
    .color-logo {
        background-color: #8e0432;
    }

    .text-logo {
        color: #8e0432;
    }

</style>
