 <h5>
    @if (count($errors) > 0)

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</h5>

<h4> <span class="font-weight-bold px-3 mt-6 text-logo" style="font-size: 25px; margin-bottom: 5px;">
        DATOS DEL ADULTO MAYOR</span>
</h4>

<div class="form-row px-3 mt-2">
    <div class="form-group col-md-6">
        <h4> <span class="fas fa-calendar-alt  " style="color:black"> Fecha de Ingreso</span> </h4>
        <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" placeholder="fecha_ingreso"
            value="{{ isset($adulto->fecha_ingreso) ? $adulto->fecha_ingreso : old('fecha_ingreso') }}" required>
            <div class="invalid-feedback">
                Por favor, ingresa tu nombre.
              </div>
    </div>
</div>
<div class="form-row px-3 mt-2">
    <div class="form-group col-md-6">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;"> Persona quien lo
                recibe</span> </h4>
        <input type="text" class="form-control" id="recibe" name="recibe"
            placeholder="Nombre de la persona que recibe al Adulto"
            value="{{ isset($adulto->recibe) ? $adulto->recibe : old('recibe') }}" required>
    </div>
</div>
<div class="form-auto px-3 mt-2">
    <h4> <span class="fas fa-user   text-dark"> Nombre del adulto mayor</span> </h4>
</div>

<div class="form-row px-3">
    <div class="col-3">
        <input type="text" name="primer_nombre" id="primer_nombre"
            value="{{ isset($adulto->primer_nombre) ? $adulto->primer_nombre : old('primer_nombre') }}"
            placeholder="Primer Nombre" class="form-control" required>
    </div>
    <div class="col-3">
        <input type="text"name="segundo_nombre" id="segundo_nombre"
            value="{{ isset($adulto->segundo_nombre) ? $adulto->segundo_nombre : old('segundo_nombre') }}"
            placeholder="Segundo Nombre" class="form-control" required>
    </div>
    <div class="col-3">
        <input type="text"name="primer_apellido" id="primer_apellido"
            value="{{ isset($adulto->primer_apellido) ? $adulto->primer_apellido : old('primer_apellido') }}"
            placeholder="Apellido Paterno" class="form-control" required>
    </div>
    <div class="col-3">
        <input type="text"name="segundo_apellido" id="segundo_apellido"
            value="{{ isset($adulto->segundo_apellido) ? $adulto->segundo_apellido : old('segundo_apellido') }}"
            placeholder="Apellido Materno" class="form-control" required>
    </div>
</div>

<div class="form-row px-3 mt-4">
    <div class="form-group col-3">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;"> Edad</span> </h4>
        <input type="number"name="edad" id="edad"
            value="{{ isset($adulto->edad) ? $adulto->edad : old('edad') }}" class="form-control" required>
    </div>
    <div class="form-group col-4">
        <h4> <span class="fas fa-calendar-alt  text-dark" style="font-size: 16px; margin-bottom: 5px;"> Fecha de
                Nacimento</span> </h4>
        <input type="date"name="fecha_nacimiento" id="fecha_nacimiento"
            value="{{ isset($adulto->fecha_nacimiento) ? $adulto->fecha_nacimiento : old('fecha_nacimiento') }}"
            class="form-control" required>
    </div>
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Registro</span>
        </h4>
        <input type="text"name="registro" id="registro"
            value="{{ isset($adulto->registro) ? $adulto->registro : old('registro') }}" placeholder="No. de registro"
            class="form-control">
    </div>
</div>

<div class="form-row px-2 mt-4">
    <div class="col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Cedula / DPI</span>
        </h4>
        <input type="text"name="DPI" id="DPI"
            value="{{ isset($adulto->DPI) ? $adulto->DPI : old('DPI') }}" placeholder="Ingresar DPI"
            class="form-control center" required>
    </div>
    <div class="col-3">
        @if (isset($adulto->foto))
            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $adulto->foto }}" width="100">
        @endif
        <h4> <span class="fas fa-camera  text-dark" style="font-size: 16px; margin-bottom: 5px;">Fotografia</span> </h4>
        <input type="file" name="foto" id="selectFoto" accept="image/*"
            class="form-control btn-outline-primary">
    </div>
    <div class="col-3">
        <label id="cambio" style="display: none;">Remplazo
            <img class="mw-100" id="viewFoto"></label>
    </div>
</div>

<div class="form-row px-3 mt-4">
    <div class="form-group col-6">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Lugar de
                origen</span> </h4>
        <input type="text" class="form-control" id="lugar_origen" name="lugar_origen"
            placeholder="Lugar de origen del adulto"
            value="{{ isset($adulto->lugar_origen) ? $adulto->lugar_origen : old('lugar_origen') }}" required>
    </div>
    <div class="form-group col-6">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Domicilio</span>
        </h4>
        <input type="text" class="form-control" id="domicilio" name="domicilio"
            placeholder="Direccion del domicilio"
            value="{{ isset($adulto->domicilio) ? $adulto->domicilio : old('domicilio') }}">
    </div>
</div>

<div class="form-row px-3 mt-4">
    <div class="form-group col-6">
        <div>
            <label class=" text-dark font-weight-bold">¿Tiene IGGS?</label>
            Si<input type="radio" id="iggs_si" name="iggs" value="Si"
                {{ (isset($adulto->iggs) && $adulto->iggs == 'Si') || old('iggs') == 'Si' ? 'checked' : '' }}>
            <span class="px-3"></span>
            No <input type="radio" id="iggs_no" name="iggs" value="No"
                {{ (isset($adulto->iggs) && $adulto->iggs == 'No') || old('iggs') == 'No' ? 'checked' : '' }}>
        </div>
        <div id="iggs_label" style="display: none;">
            <label class=" text-dark font-weight-bold">Numero de IGGS:</label>
            <input type="text" id="iggs_identificacion" name="iggs_identificacion"
                value="{{ isset($adulto->iggs_identificacion) ? $adulto->iggs_identificacion : old('iggs_identificacion') }}">
        </div>
    </div>
    <div class="form-group col-6">
        <div>
            <label class=" text-dark font-weight-bold">¿Aporta una cuota?</label>
            Sí <input type="radio" id="cuota_si" name="cuota" value="Si""
                {{ (isset($adulto->cuota) && $adulto->cuota == 'Si') || old('cuota') == 'Si' ? 'checked' : '' }}>
            <span class="px-3"></span>
            No <input type="radio" id="cuota_no" name="cuota" value="No"
                {{ (isset($adulto->cuota) && $adulto->cuota == 'No') || old('cuota') == 'No' ? 'checked' : '' }}>
        </div>
        <div id="cuota_label" style="display: none;">
            <label class=" text-dark font-weight-bold">Monto de la cuota:</label>
            <input type="number" id="cuota_monto" name="cuota_monto"
                value="{{ isset($adulto->cuota_monto) ? $adulto->cuota_monto : old('cuota_monto') }}">
        </div>
    </div>
</div>

<!-- tabla responsable Referencia -->
<h4> <span class="text-logo font-weight-bold px-3 mt-6 " style="font-size: 25px; margin-bottom: 5px;">
        DATOS DEL RESPONSABLE</span>
</h4>
<div class="form-row px-3 mt-2">
    <div class="form-group col-6">
        <label for="procedencia" class=" text-dark font-weight-bold"
            style="font-size: 16px; margin-bottom: 5px;">Referido por:</label>
            <select class="form-control" name="procedencia" id="procedencia" class="form-control" required>
                <option value="">Seleccione una opción</option>
                <option value="No Referido" {{ (isset($responsable->procedencia) && $responsable->procedencia == 'No Referido') ? 'selected' : '' }}>No Referido</option>
                <option value="PNC" {{ (isset($responsable->procedencia) && $responsable->procedencia == 'PNC') ? 'selected' : '' }}>PNC</option>
                <option value="BCVBG" {{ (isset($responsable->procedencia) && $responsable->procedencia == 'BCVBG') ? 'selected' : '' }}>BCVBG</option>
                <option value="HRO" {{ (isset($responsable->procedencia) && $responsable->procedencia == 'HRO') ? 'selected' : '' }}>HRO</option>
                <option value="PDH" {{ (isset($responsable->procedencia) && $responsable->procedencia == 'PDH') ? 'selected' : '' }}>PDH</option>
                <option value="PGN" {{ (isset($responsable->procedencia) && $responsable->procedencia == 'PGN') ? 'selected' : '' }}>PGN</option>
            </select>            
    </div>
</div>
<div class="form-row px-3 mt-2">
    <div class="form-group col-12">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Nombre del
                responsable</span>
        </h4>
        <input type="text"name="responsable" id="responsable" placeholder="Nombre Completo del Responsable"
            class="form-control"
            value="{{ isset($responsable->responsable) ? $responsable->responsable : old('responsable') }}" required>
    </div>
</div>

<div class="form-row px-3 mt-2">
    <div class="col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">DPI Del
                Responsable</span>
        </h4>
        <input type="text"name="dpi_encargado" id="dpi_encargado"
            value="{{ isset($responsable->dpi_encargado) ? $responsable->dpi_encargado : old('dpi_encargado') }}"
            placeholder="Ingresar dpi del responsable" class="form-control center" required>
    </div>
    <div class="col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Telefono
                Residencia</span>
        </h4>
        <input type="text"name="telefono" id="telefono"
            value="{{ isset($responsable->telefono) ? $responsable->telefono : old('telefono') }}"
            placeholder="Telefono de casa" class="form-control center">
    </div>
    <div class="col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Celular</span>
        </h4>
        <input type="text"name="celular" id="celular" placeholder="Telefono celular"
            value="{{ isset($responsable->celular) ? $responsable->celular : old('celular') }}"
            class="form-control center" required>
    </div>
</div>

<div class="form-row px-3 mt-2">
    <div class="form-group col-8">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Domicilio del
                Encargado</span>
        </h4>
        <input type="text"name="direccion" id="direccion"
            value="{{ isset($responsable->direccion) ? $responsable->direccion : old('direccion') }}"
            placeholder="Ingresar la direccion del Responsable" class="form-control center" required>
    </div>
</div>

<!--TERMINA SEECCION DE RESPONSABLE-->

<div class="form-row px-3 mt-4">
    <div class="form-group col-12">
        <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;"> Firma Contrato de
            Ingreso parientes obligatorio:</label>

        Sí <input type="radio" id="firma_pariente_si" name="firma_pariente" value="Si"
            {{ (isset($adulto->firma_pariente) && $adulto->firma_pariente == 'Si') || old('firma_pariente') == 'Si' ? 'checked' : '' }}
            required>
        <span class="px-3"></span>
        No <input type="radio" id="firma_pariente_no" name="firma_pariente" value="No"
            {{ (isset($adulto->firma_pariente) && $adulto->firma_pariente == 'No') || old('firma_pariente') == 'No' ? 'checked' : '' }}
            required>
    </div>
</div>
<div class="form-row px-3">
    <div class="form-group col-12">
        <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Paciente esta de
            acuerdo con ingresar al Hogar:</label>
        Sí
        <input type="radio" id="firma_adulto_si" name="firma_adulto" value="Si"
            {{ (isset($adulto->firma_adulto) && $adulto->firma_adulto == 'Si') || old('firma_adulto') == 'Si' ? 'checked' : '' }}
            required>
        <span class="px-3"></span>
        No
        <input type="radio" id="firma_adulto_no" name="firma_adulto" value="No"
            {{ (isset($adulto->firma_adulto) && $adulto->firma_adulto == 'No') || old('firma_adulto') == 'No' ? 'checked' : '' }}
            required>
    </div>
</div>

<div class="form-group col-12">
    <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Motivo del
            ingreso</span>
    </h4>
    <input type="text" class="form-control" id="motivo_ingreso" name="motivo_ingreso"
        placeholder="Motivo por el cual ingreso el adulto"
        value="{{ isset($adulto->motivo_ingreso) ? $adulto->motivo_ingreso : old('motivo_ingreso') }}" required>
</div>


<!-- EMPIEZ SEECION DE CONDICION FISICA--->
<h4> <span class=" text-logo font-weight-bold px-3 mt-6" style="font-size: 25px; margin-bottom: 5px;">
        CONDICIONES FISICAS DE INGRESO</span>
</h4>
<div class="form-row px-3 mt-3">
    <div class="form-group col-4" name="conciente">
        <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Entro
            Conciente:</label>
        Sí
        <input type="radio" id="conciente_si" name="conciente" value="Si"
            {{ (isset($condicion->conciente) && $condicion->conciente == 'Si') || old('conciente') == 'Si' ? 'checked' : '' }}>
        <span class="px-3"></span>
        No <input type="radio" id="conciente_no" name="conciente" value="No"
            {{ (isset($condicion->conciente) && $condicion->conciente == 'No') || old('conciente') == 'No' ? 'checked' : '' }}>
    </div>
    <div class="form-group col-4">
        <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Camina:</label>
        Sí <input type="radio" id="camina_si" name="camina" value="Si"
            {{ (isset($condicion->camina) && $condicion->camina == 'Si') || old('camina') == 'Si' ? 'checked' : '' }}>
        <span class="px-3"></span>
        No <input type="radio" id="camina_no" name="camina" value="No"
            {{ (isset($condicion->camina) && $condicion->camina == 'No') || old('camina') == 'No' ? 'checked' : '' }}>
    </div>
    <div class="form-group col-4">
        <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Habla:</label>
        Sí <input type="radio" id="habla_si" name="habla" value="Si"
            {{ (isset($condicion->habla) && $condicion->habla == 'Si') || old('habla') == 'Si' ? 'checked' : '' }}>
        <span class="px-3"></span>
        No <input type="radio" id="habla_no" name="habla" value="No"
            {{ (isset($condicion->habla) && $condicion->habla == 'No') || old('habla') == 'No' ? 'checked' : '' }}>
    </div>
</div>
<div class="form-row px-3">
    <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Vidente:</label>
    <div class="form-group col-2">
        Sí <input type="radio" id="vidente_si" name="vidente" value="Si"
            {{ (isset($condicion->vidente) && $condicion->vidente == 'Si') || old('vidente') == 'Si' ? 'checked' : '' }}>
    </div>
    <div class="form-group col-2">
        No <input type="radio" id="vidente_no" name="vidente" value="No"
            {{ (isset($condicion->vidente) && $condicion->vidente == 'No') || old('vidente') == 'No' ? 'checked' : '' }}>
    </div>
    <div class="form-group col-2">
        Con Dificultad : <input type="radio" id="vidente_d" name="vidente" value="Con Dificultad"
            {{ (isset($condicion->vidente) && $condicion->vidente == 'Con Dificultad') || old('vidente') == 'Con Dificultad' ? 'checked' : '' }}>
    </div>
</div>

<div class="form-row px-3">
    <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Utiliza Silla de Ruedas u
        Otros:</label>
    <div class="form-group col-2">
        Sí <input type="radio" id="dificultad_motora_si" name="dificultad_motora" value="Si"
            {{ (isset($condicion->dificultad_motora) && $condicion->dificultad_motora == 'Si') || old('dificultad_motora') == 'Si' ? 'checked' : '' }}>
    </div>
    <div class="form-group col-2">
        No <input type="radio" id="dificultad_motora_no" name="dificultad_motora" value="No"
            {{ (isset($condicion->dificultad_motora) && $condicion->dificultad_motora == 'No') || old('dificultad_motora') == 'No' ? 'checked' : '' }}>
    </div>
    <div class="form-group col-2">
        Bastón <input type="radio" id="dificultad_motora_d" name="dificultad_motora" value="Baston"
            {{ (isset($condicion->dificultad_motora) && $condicion->dificultad_motora == 'Baston') || old('dificultad_motora') == 'Con Dificultad' ? 'checked' : '' }}>
    </div>
</div>
<div class="form-group px-3 ">
    <div class="col-12">
        <h4> <span class=" text-dark font-weight-bold"
                style="font-size: 18px; margin-bottom: 5px;">Observaciones:</span>
        </h4>
        <textarea class="form-control" name="observaciones" rows="6" placeholder="Observaciones">{{ isset($condicion->observaciones) ? $condicion->observaciones : old('observaciones') }}</textarea>
    </div>
</div>
<!-- TERMINA SEECION DE CONDICION FISICA--->

<!-- ESTADO DEL ADULTO -->
<div class="col-4">
    <label for="estado_actual" class="text-logo font-weight-bold px-3 mt-6" style="font-size: 25px; margin-bottom: 5px;">Estado</label>
    <select class="form-control" name="estado_actual" id="estado_actual" class="form-control" required>
        <option value="">Seleccione una opción</option>
        <option value="Activo" {{ (isset($adulto->estado_actual) && $adulto->estado_actual == 'Activo') ? 'selected' : '' }}>Activo</option>
        <option value="Inactivo" {{ (isset($adulto->estado_actual) && $adulto->estado_actual == 'Inactivo') ? 'selected' : '' }}>Inactivo</option>
    </select>    
</div>

<div class="col-auto ">
    <label id="fecha_salida" style="display: none;" class="text-dark">Fecha de salida: <input type="date" name="fecha_salida"
            class="form-control"
            value="{{ isset($adulto->fecha_salida) ? $adulto->fecha_salida : old('fecha_salida') }}"></label>
    <label id="motivo_salida" style="display: none;" class="text-dark">Motivo de salida: <input type="text" name="motivo_salida"
            class="form-control"
            value="{{ isset($adulto->motivo_salida) ? $adulto->motivo_salida : old('motivo_salida') }}"></label>
</div>
<!-- FINALIZA ESTADO-->

<br> 

<!--DATOS FINALES OPCIONALES TODOS -->
<h4> <span class=" text-logo font-weight-bold px-3 mt-6" style="font-size: 25px; margin-bottom: 5px;">
    DATOS ADICIONALES - OPCIONALES</span>
</h4>

<button type="button" id="toggleCampos" class="color-logo text-white">MOSTRAR CAMPOS FICHA 2 </button>


<div class="campos-padece" style="display: none;">

    <!--Padece alguna enfermedad-->
    <div class="form-row px-3 mt-3">
        <div class="form-group col-6" name="conciente">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Padece alguna
                enfermedad:</label>
            Sí
            <input type="radio" id="enfermedad_si" name="enfermedad" value="Si"
                {{ (isset($ficha->enfermedad) && $ficha->enfermedad == 'Si') || old('enfermedad') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="enfermedad_no" name="enfermedad" value="No"
                {{ (isset($ficha->enfermedad) && $ficha->enfermedad == 'No') || old('enfermedad') == 'No' ? 'checked' : '' }}>
        </div>
        <div class="form-group col-6" name="enfermedad_nombre">
            <span class=" text-dark font-weight-bold">Cual Enfermedad:</span>
            <input type="text"name="enfermedad_nombre" id="enfermedad_nombre"
                value="{{ isset($ficha->enfermedad_nombre) ? $ficha->enfermedad_nombre : old('enfermedad_nombre') }}"
                placeholder="Cual enfermedad" class="form-control center" >
        </div>
    </div>

    <!--toma algun medicamento-->
    <div class="form-row px-3">
        <div class="form-group col-6" name="toma_medicmento">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Toma algun
                medicamento:</label>
            Sí
            <input type="radio" id="medicamento_si" name="medicamento" value="Si"
                {{ (isset($ficha->medicamento) && $ficha->medicamento == 'Si') || old('medicamento') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="medicamento_no" name="medicamento" value="No"
                {{ (isset($ficha->medicamento) && $ficha->medicamento == 'No') || old('medicamento') == 'No' ? 'checked' : '' }}>
        </div>
        <div class="form-group col-6" name="medicamento_nombre">
            <span class=" text-dark font-weight-bold">Cual Medicamento:</span>
            <input type="text"name="medicamento_nombre" id="medicamento_nombre"
                value="{{ isset($ficha->medicamento_nombre) ? $ficha->medicamento_nombre : old('medicamento_nombre') }}"
                placeholder="Cual medicamento" class="form-control center" >
        </div>
    </div>

    <!--puede dormir-->
    <div class="form-row px-3">
        <div class="form-group col-6" name="duerme">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Duerme por las
                noches :</label>
            Sí
            <input type="radio" id="duerme_si" name="duerme" value="Si"
                {{ (isset($ficha->duerme) && $ficha->duerme == 'Si') || old('duerme') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="duerme_no" name="duerme" value="No"
                {{ (isset($ficha->duerme) && $ficha->duerme == 'No') || old('duerme') == 'No' ? 'checked' : '' }}>
        </div>
    </div>

    <!--Tiene algun tic o mania-->
    <div class="form-row px-3">
        <div class="form-group col-6" name="tic_o_mania">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Tiene algun tic o
                mania :</label>
            Sí
            <input type="radio" id="tic_si" name="tic" value="Si"
                {{ (isset($ficha->tic) && $ficha->tic == 'Si') || old('tic') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="tic_no" name="tic" value="No"
                {{ (isset($ficha->tic) && $ficha->tic == 'No') || old('tic') == 'No' ? 'checked' : '' }}>
        </div>
        <div class="form-group col-6" name="ic_o_mania">
            <span class=" text-dark font-weight-bold">Qué tic o mania:</span>
            <input type="text"name="tic_nombre" id="tic_nombre"
                value="{{ isset($ficha->tic_nombre) ? $ficha->tic_nombre : old('tic_nombre') }}"
                placeholder="Cual tic o mania" class="form-control center" >
        </div>
    </div>

    <!--Necesidades-->
    <div class="form-row px-3">
        <div class="form-group col-8" name="conciente">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Hace sus
                necesidades Fisiologicas por si solo :</label>
            Sí
            <input type="radio" id="necesidades_si" name="necesidades" value="Si"
                {{ (isset($ficha->necesidades) && $ficha->necesidades == 'Si') || old('necesidades') == 'Si' ? 'checked' : '' }}>
            <span class="px-2"></span>
            No<input type="radio" id="necesidades_no" name="necesidades" value="No"
                {{ (isset($ficha->necesidades) && $ficha->necesidades == 'No') || old('necesidades') == 'No' ? 'checked' : '' }}>
        </div>
    </div>

    <!--Tiene alguna operacion-->
    <div class="form-row px-3">
        <div class="form-group col-6" name="conciente">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Tiene alguna
                operación :</label>
            Sí
            <input type="radio" id="operacion_si" name="operacion" value="Si"
                {{ (isset($ficha->operacion) && $ficha->operacion == 'Si') || old('operacion') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="operacion_no" name="operacion" value="No"
                {{ (isset($ficha->operacion) && $ficha->operacion == 'No') || old('operacion') == 'No' ? 'checked' : '' }}>
        </div>
        <div class="form-group col-6" name="conciente">
            <span class=" text-dark font-weight-bold">Cual operacion:</span>
            <input type="text"name="operacion_nombre" id="operacion_nombre"
                value="{{ isset($ficha->operacion_nombre) ? $ficha->operacion_nombre : old('operacion_nombre') }}"
                placeholder="Cual operacion tiene" class="form-control center" >
        </div>
    </div>

    <!--Vicios-->
    <div class="form-row px-3">
        <div class="form-group col-6" name="conciente">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Toma bebidas
                alcohólicas:</label>
            Sí
            <input type="radio" id="alchol_si" name="alchol" value="Si"
                {{ (isset($ficha->alchol) && $ficha->alchol == 'Si') || old('alchol') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="alchol_no" name="alchol" value="No"
                {{ (isset($ficha->alchol) && $ficha->alchol == 'No') || old('alchol') == 'No' ? 'checked' : '' }}>
        </div>
        <div class="form-group col-6" name="conciente">
            <div class="form-group col-6" name="conciente">
                <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Fuma:</label>
                Sí
                <input type="radio" id="fuma_si" name="fuma" value="Si"
                    {{ (isset($ficha->fuma) && $ficha->fuma == 'Si') || old('fuma') == 'Si' ? 'checked' : '' }}>
                <span class="px-1"></span>
                No<input type="radio" id="fuma_no" name="fuma" value="No"
                    {{ (isset($ficha->fuma) && $ficha->fuma == 'No') || old('fuma') == 'No' ? 'checked' : '' }}>
            </div>
        </div>
    </div>

    <!--alegico medician-->
    <div class="form-row px-3">
        <div class="form-group col-6" name="conciente">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Es alergico a
                alguna
                medicina :</label>
            Sí
            <input type="radio" id="alergia_m_si" name="alergia_m" value="Si"
                {{ (isset($ficha->alergia_m) && $ficha->alergia_m == 'Si') || old('alergia_m') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="alergia_m_no" name="alergia_m" value="No"
                {{ (isset($ficha->alergia_m) && $ficha->alergia_m == 'No') || old('alergia_m') == 'No' ? 'checked' : '' }}>
        </div>
        <div class="form-group col-6" name="conciente">
            <span class=" text-dark font-weight-bold">A cual medicina:</span>
            <input type="text"name="alergia_medicina" id="alergia_medicina"
                value="{{ isset($ficha->alergia_medicina) ? $ficha->alergia_medicina : old('alergia_medicina') }}"
                placeholder="Cual medicina" class="form-control center" >
        </div>
    </div>

    <!--alegico comida-->
    <div class="form-row px-3">
        <div class="form-group col-6" name="conciente">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Es alergico a
                alguna
                comida :</label>
            Sí
            <input type="radio" id="alergia_c_si" name="alergia_c" value="Si"
                {{ (isset($ficha->alergia_c) && $ficha->alergia_c == 'Si') || old('alergia_c') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="alergia_c_no" name="alergia_c" value="No"
                {{ (isset($ficha->alergia_c) && $ficha->alergia_c == 'No') || old('alergia_c') == 'No' ? 'checked' : '' }}>
        </div>
        <div class="form-group col-6" name="conciente">
            <span class=" text-dark font-weight-bold">A cual comida:</span>
            <input type="text"name="alergia_comida" id="alergia_comida"
                value="{{ isset($ficha->alergia_comida) ? $ficha->alergia_comida : old('alergia_comida') }}"
                placeholder="Cual comida" class="form-control center" >
        </div>
    </div>

    <!--Fractura-->
    <div class="form-row px-3">
        <div class="form-group col-6" name="conciente">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Ha tenido alguna
                factura :</label>
            Sí
            <input type="radio" id="fractura_si" name="fractura" value="Si"
                {{ (isset($ficha->fractura) && $ficha->fractura == 'Si') || old('fractura') == 'si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="fractura_no" name="fractura" value="No"
                {{ (isset($ficha->fractura) && $ficha->fractura == 'No') || old('fractura') == 'No' ? 'checked' : '' }}>
        </div>
        <div class="form-group col-6" name="conciente">
            <span class=" text-dark font-weight-bold">En donde se a fracturado:</span>
            <input type="text"name="fractura_donde" id="fractura_donde"
                value="{{ isset($ficha->fractura_donde) ? $ficha->fractura_donde : old('fractura_donde') }}"
                placeholder="En donde tiene la fatura:" class="form-control center" >
        </div>
    </div>

    <!--Cicatriz-->
    <div class="form-row px-3">
        <div class="form-group col-6" name="conciente">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Tiene alguna
                cicatriz
                :</label>
            Sí
            <input type="radio" id="cicatriz_si" name="cicatriz" value="Si"
                {{ (isset($ficha->cicatriz) && $ficha->cicatriz == 'Si') || old('cicatriz') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="cicatriz_no" name="cicatriz" value="No"
                {{ (isset($ficha->cicatriz) && $ficha->cicatriz == 'No') || old('cicatriz') == 'No' ? 'checked' : '' }}>
        </div>
        <div class="form-group col-6" name="conciente">
            <span class=" text-dark font-weight-bold">Localización de la cicatriz:</span>
            <input type="text"name="cicatriz_donde" id="cicatriz_donde"
                value="{{ isset($ficha->cicatriz_donde) ? $ficha->cicatriz_donde : old('cicatriz_donde') }}"
                placeholder="En donde:" class="form-control center" >
        </div>
    </div>

    <!--tauaje-->
    <div class="form-row px-3">
        <div class="form-group col-6" name="conciente">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Tiene algun
                tatuaje
                :</label>
            Sí
            <input type="radio" id="tatuaje_si" name="tatuaje" value="Si"
                {{ (isset($ficha->tatuaje) && $ficha->tatuaje == 'Si') || old('tatuaje') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="tatuaje_no" name="tatuaje" value="No"
                {{ (isset($ficha->tatuaje) && $ficha->tatuaje == 'No') || old('tatuaje') == 'No' ? 'checked' : '' }}>
        </div>
        <div class="form-group col-6" name="conciente">
            <span class=" text-dark font-weight-bold">Localización del tatuaje:</span>
            <input type="text"name="tatuaje_donde" id="tatuaje_donde"
                value="{{ isset($ficha->tatuaje_donde) ? $ficha->tatuaje_donde : old('tatuaje_donde') }}"
                placeholder="En donde:" class="form-control center" >
        </div>
    </div>

    <!--herida-->
    <div class="form-row px-3">
        <div class="form-group col-6" name="conciente">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Tiene alguna
                herida
                :</label>
            Sí
            <input type="radio" id="herida_si" name="herida" value="Si"
                {{ (isset($ficha->herida) && $ficha->herida == 'Si') || old('herida') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="herida_no" name="herida" value="No"
                {{ (isset($ficha->herida) && $ficha->herida == 'No') || old('herida') == 'No' ? 'checked' : '' }}>
        </div>
        <div class="form-group col-6" name="conciente">
            <span class=" text-dark font-weight-bold">En donde se encuentra la herida:</span>
            <input type="text"name="herida_donde" id="herida_donde"
                value="{{ isset($ficha->herida_donde) ? $ficha->herida_donde : old('herida_donde') }}"
                placeholder="En donde:" class="form-control center" >
        </div>
    </div>

    <!--Orientado-->
    <h4> <span class="text-dark font-weight-bold px-3 mt-6" style="font-size: 18px; margin-bottom: 5px;">
            Esta orientado en:</span>
    </h4>
    <div class="form-row px-3">
        <div class="form-group col-4" name="conciente">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Fecha :</label>
            Sí
            <input type="radio" id="fecha_si" name="fecha" value="Si"
                {{ (isset($ficha->fecha) && $ficha->fecha == 'Si') || old('fecha') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="fecha_no" name="fecha" value="No"
                {{ (isset($ficha->fecha) && $ficha->fecha == 'No') || old('fecha') == 'No' ? 'checked' : '' }}>
        </div>
        <div class="form-group col-4" name="conciente">

            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Nombre :</label>
            Sí
            <input type="radio" id="nombre_si" name="nombre" value="Si"
                {{ (isset($ficha->nombre) && $ficha->nombre == 'Si') || old('nombre') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="nombre_no" name="nombre" value="No"
                {{ (isset($ficha->nombre) && $ficha->nombre == 'No') || old('nombre') == 'No' ? 'checked' : '' }}>

        </div>
        <div class="form-group col-4" name="conciente">
            <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Lugar :</label>
            Sí
            <input type="radio" id="lugar_si" name="lugar" value="Si"
                {{ (isset($ficha->lugar) && $ficha->lugar == 'Si') || old('lugar') == 'Si' ? 'checked' : '' }}>
            <span class="px-1"></span>
            No<input type="radio" id="lugar_no" name="lugar" value="No"
                {{ (isset($ficha->lugar) && $ficha->lugar == 'No') || old('lugar') == 'no' ? 'checked' : '' }}>
        </div>
    </div>
</div>

<!--FINAL DATOS OPCIONALES TODOS -->



<!--BOTONES -->
<div class="row px-3 py-3">
    <div class="col-auto">
        <button class="btn btn-outline-success" type="submit">Guardar Datos <i class="fas fa-save"></i></button>
    </div>
    <div class="col-auto">
        <a class="btn btn-outline-danger" href="{{ url('adulto') }}"> Cancelar</a>
    </div>
</div>

</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('toggleCampos');
        const camposConciente = document.querySelector('.campos-padece');
        
        toggleButton.addEventListener('click', function() {
            if (camposConciente.style.display === 'none') {
                camposConciente.style.display = 'block';
            } else {
                camposConciente.style.display = 'none';
            }
        });
    });
</script>


<script>
    document.getElementById("padecimiento_si").addEventListener("change", function() {
        var nombreEnfermedadInput = document.getElementById("nombre_enfermedad");
        nombreEnfermedadInput.disabled = !this.checked;
    });

    document.getElementById("padecimiento_no").addEventListener("change", function() {
        var nombreEnfermedadInput = document.getElementById("nombre_enfermedad");
        nombreEnfermedadInput.disabled = this.checked;
    });
</script>

<script>
    // Obtener referencias a los elementos
    const iggsSiRadio = document.getElementById('iggs_si');
    const iggsNoRadio = document.getElementById('iggs_no');
    const iggsLabel = document.getElementById('iggs_label');
    const iggsInput = document.getElementById('iggs_identificacion');
    const cuotaSiRadio = document.getElementById('cuota_si');
    const cuotaNoRadio = document.getElementById('cuota_no');
    const cuotaLabel = document.getElementById('cuota_label');
    const cuotaInput = document.getElementById('cuota_monto');
    const cuotaLabelDiv = document.getElementById('cuota_label');
    const cuotaLabelDiv2 = document.getElementById('iggs_label');
    // IGGS
    iggsSiRadio.addEventListener('change', () => {
        iggsLabel.style.display = 'block';
        iggsInput.disabled = false;
    });

    iggsNoRadio.addEventListener('change', () => {
        iggsLabel.style.display = 'none';
        iggsInput.disabled = true;
    });

    // IGGS
    cuotaSiRadio.addEventListener('change', () => {
        cuotaLabel.style.display = 'block';
        cuotaInput.disabled = false;
    });

    cuotaNoRadio.addEventListener('change', () => {
        cuotaLabel.style.display = 'none';
        cuotaInput.disabled = true;
    });


    //editar
    if (cuotaSiRadio.checked) {
        cuotaLabelDiv.style.display = 'block';
    }

    if (iggsSiRadio.checked) {
        cuotaLabelDiv2.style.display = 'block';
    }
</script>

<script>
    // Función para habilitar/deshabilitar radios opuestos
    function toggleOtherRadio(radio, otherRadioId) {
        const otherRadio = document.getElementById(otherRadioId);
        otherRadio.disabled = !radio.checked;
    }

    // Agregar eventos de cambio a los radios
    const firmaParienteSiRadio = document.getElementById('firma_pariente_si');
    const firmaParienteNoRadio = document.getElementById('firma_pariente_no');
    const firmaAdultoSiRadio = document.getElementById('firma_adulto_si');
    const firmaAdultoNoRadio = document.getElementById('firma_adulto_no');

    firmaParienteSiRadio.addEventListener('change', () => {
        toggleOtherRadio(firmaParienteSiRadio, 'firma_pariente_no');
    });

    firmaParienteNoRadio.addEventListener('change', () => {
        toggleOtherRadio(firmaParienteNoRadio, 'firma_pariente_si');
    });

    firmaAdultoSiRadio.addEventListener('change', () => {
        toggleOtherRadio(firmaAdultoSiRadio, 'firma_adulto_no');
    });

    firmaAdultoNoRadio.addEventListener('change', () => {
        toggleOtherRadio(firmaAdultoNoRadio, 'firma_adulto_si');
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectEstado = document.getElementById('estado_actual');
        const labelInfoAdicional1 = document.getElementById('fecha_salida');
        const labelInfoAdicional2 = document.getElementById('motivo_salida');

        selectEstado.addEventListener('change', function() {
            if (selectEstado.value === 'Inactivo') {
                labelInfoAdicional1.style.display = 'block';
                labelInfoAdicional2.style.display = 'block';
            } else {
                labelInfoAdicional1.style.display = 'none';
                labelInfoAdicional2.style.display = 'none';
            }
        });

        if (selectEstado.value === 'Inactivo') {
            labelInfoAdicional1.style.display = 'block';
            labelInfoAdicional2.style.display = 'block';
        }
    });
</script>

<script>
    const cambioFoto = document.getElementById('cambio');
    const $select_Foto = document.querySelector("#selectFoto"),
        $viewFoto = document.querySelector("#viewFoto");

    $select_Foto.addEventListener("change", () => {

        const archivos = $select_Foto.files;

        if (!archivos || !archivos.length) {
            $viewFoto.src = "";
            $cambioFoto.style.display = 'none';
            return;
        }

        const primerArchivo = archivos[0];
        const objectURL = URL.createObjectURL(primerArchivo);

        $viewFoto.src = objectURL;
        cambioFoto.style.display = 'block';
    });
</script>




<style>
    .color-logo {
        background-color: #8e0432;
        color: #8e0432;
    }

    .text-logo {
        color: #8e0432;
    }
</style>
