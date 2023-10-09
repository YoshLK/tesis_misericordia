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

<h4> <span class=" text-info font-weight-bold px-3 mt-6" style="font-size: 18px; margin-bottom: 5px;">
        DATOS DEL ADULTO MAYOR</span>
</h4>

<div class="form-row px-3 mt-2">
    <div class="form-group col-md-6">
        <h4> <span class="fas fa-calendar-alt  " style="color:black"> Fecha de Ingreso</span> </h4>
        <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" placeholder="fecha_ingreso"
            value="{{ isset($adulto->fecha_ingreso) ? $adulto->fecha_ingreso : old('fecha_ingreso') }}">
    </div>
</div>
<div class="form-row px-3 mt-2">
    <div class="form-group col-md-6">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;"> Persona quien lo
                recibe</span> </h4>
        <input type="text" class="form-control" id="recibe" name="recibe"
            placeholder="Nombre de la persona que recibe al Adulto"
            value="{{ isset($adulto->recibe) ? $adulto->recibe : old('recibe') }}">
    </div>
</div>
<div class="form-auto px-3 mt-2">
    <h4> <span class="fas fa-user   text-dark"> Nombre del adulto mayor</span> </h4>
</div>

<div class="form-row px-3">
    <div class="col-3">
        <input type="text" name="primer_nombre" id="primer_nombre"
            value="{{ isset($adulto->primer_nombre) ? $adulto->primer_nombre : old('primer_nombre') }}"
            placeholder="Primer Nombre" class="form-control">
    </div>
    <div class="col-3">
        <input type="text"name="segundo_nombre" id="segundo_nombre"
            value="{{ isset($adulto->segundo_nombre) ? $adulto->segundo_nombre : old('segundo_nombre') }}"
            placeholder="Segundo Nombre" class="form-control">
    </div>
    <div class="col-3">
        <input type="text"name="primer_apellido" id="primer_apellido"
            value="{{ isset($adulto->primer_apellido) ? $adulto->primer_apellido : old('primer_apellido') }}"
            placeholder="Apellido Paterno" class="form-control">
    </div>
    <div class="col-3">
        <input type="text"name="segundo_apellido" id="segundo_apellido"
            value="{{ isset($adulto->segundo_apellido) ? $adulto->segundo_apellido : old('segundo_apellido') }}"
            placeholder="Apellido Materno" class="form-control">
    </div>
</div>

<div class="form-row px-3 mt-4">
    <div class="form-group col-3">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;"> Edad</span> </h4>
        <input type="number"name="edad" id="edad"
            value="{{ isset($adulto->edad) ? $adulto->edad : old('edad') }}" class="form-control">
    </div>
    <div class="form-group col-4">
        <h4> <span class="fas fa-calendar-alt  text-dark" style="font-size: 16px; margin-bottom: 5px;"> Fecha de
                Nacimento</span> </h4>
        <input type="date"name="fecha_nacimiento" id="fecha_nacimiento"
            value="{{ isset($adulto->fecha_nacimiento) ? $adulto->fecha_nacimiento : old('fecha_nacimiento') }}"
            class="form-control">
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
            class="form-control center">
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
            value="{{ isset($adulto->lugar_origen) ? $adulto->lugar_origen : old('lugar_origen') }}">
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
            <input type="radio" id="iggs_si" name="iggs" value="si"
                {{ (isset($adulto->iggs) && $adulto->iggs == 'si') || old('iggs') == 'no' ? 'checked' : '' }}> Sí
            <input type="radio" id="iggs_no" name="iggs" value="no"
                {{ (isset($adulto->iggs) && $adulto->iggs == 'no') || old('iggs') == 'no' ? 'checked' : '' }}> No
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
            <input type="radio" id="cuota_si" name="cuota" value="si""
                {{ (isset($adulto->cuota) && $adulto->cuota == 'si') || old('cuota') == 'no' ? 'checked' : '' }}> Sí
            <input type="radio" id="cuota_no" name="cuota" value="no"
                {{ (isset($adulto->cuota) && $adulto->cuota == 'no') || old('cuota') == 'no' ? 'checked' : '' }}> No
        </div>
        <div id="cuota_label" style="display: none;">
            <label class=" text-dark font-weight-bold">Monto de la cuota:</label>
            <input type="number" id="cuota_monto" name="cuota_monto"
                value="{{ isset($adulto->cuota_monto) ? $adulto->cuota_monto : old('cuota_monto') }}">
        </div>
    </div>
</div>

<!-- tabla referencias primer Referencia -->
<h4> <span class=" text-info font-weight-bold px-3 mt-6" style="font-size: 18px; margin-bottom: 5px;">
        DATOS DEL RESPONSABLE</span>
</h4>
<div class="form-row px-3 mt-2">
    <div class="form-group col-6">
        <label for="procedencia" class=" text-dark font-weight-bold"
            style="font-size: 16px; margin-bottom: 5px;">Referido por:</label>
        <select class="form-control" name="procedencia" id="procedencia" class="form-control">
            <option>{{ isset($responsable->procedencia) ? $responsable->procedencia : old('procedencia') }}</option>
            <option>No Referido</option>
            <option>PNC</option>
            <option>BCVBG</option>
            <option>HRO</option>
            <option>PDH</option>
            <option>PGN</option>
        </select>
    </div>
</div>
<div class="form-row px-3 mt-2">
    <div class="form-group col-12">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Nombre del
                responsable</span>
        </h4>
        <input type="text"name="responsable" id="responsable" placeholder="Nombre Completo del Responsable"
            class="form-control" value="{{ isset($responsable->responsable) ? $responsable->responsable : old('responsable') }}">
    </div>
</div>

<div class="form-row px-3 mt-2">
    <div class="col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">DPI Del
                Responsable</span>
        </h4>
        <input type="text"name="dpi_encargado" id="dpi_encargado"
        value="{{ isset($responsable->dpi_encargado) ? $responsable->dpi_encargado : old('dpi_encargado') }}"
            placeholder="Ingresar dpi del responsable" class="form-control center">
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
        <input type="text"name="celular" id="celular"
           placeholder="Telefono celular" value="{{ isset($responsable->celular) ? $responsable->celular : old('celular') }}"
            class="form-control center">
    </div>
</div>

<div class="form-row px-3 mt-2">
    <div class="form-group col-8">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Domicilio del
                Encargado</span>
        </h4>
        <input type="text"name="direccion" id="direccion"
        value="{{ isset($responsable->direccion) ? $responsable->direccion : old('direccion') }}"
            placeholder="Ingresar la direccion del Responsable" class="form-control center">
    </div>
</div>

//////////////////////////


<div class="form-row px-3 mt-4">
    <div class="form-group col-6">
        <label class=" text-dark font-weight-bold"> Firma Contrato de Ingreso parientes OBLIGATORIO:</label>
        <input type="radio" id="firma_pariente_si" name="firma_pariente" value="si"
            {{ (isset($adulto->firma_pariente) && $adulto->firma_pariente == 'si') || old('firma_pariente') == 'no' ? 'checked' : '' }}>
        Sí
        <input type="radio" id="firma_pariente_no" name="firma_pariente" value="no"
            {{ (isset($adulto->firma_pariente) && $adulto->firma_pariente == 'no') || old('firma_pariente') == 'no' ? 'checked' : '' }}>
        No
    </div>
    <div class="form-group col-6">
        <label class=" text-dark font-weight-bold">Paciente esta de acuerdo con ingresar al Hogar:</label>
        <input type="radio" id="firma_adulto_si" name="firma_adulto" value="si"
            {{ (isset($adulto->firma_adulto) && $adulto->firma_adulto == 'si') || old('firma_adulto') == 'si' ? 'checked' : '' }}>
        Sí
        <input type="radio" id="firma_adulto_no" name="firma_adulto" value="no"
            {{ (isset($adulto->firma_adulto) && $adulto->firma_adulto == 'no') || old('firma_adulto') == 'no' ? 'checked' : '' }}>
        No
    </div>
</div>

<div class="form-group col-12">
    <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Motivo del
            ingreso</span>
    </h4>
    <input type="text" class="form-control" id="motivo_ingreso" name="motivo_ingreso"
        placeholder="Motivo por lecual ingreso el adulto"
        value="{{ isset($adulto->motivo_ingreso) ? $adulto->motivo_ingreso : old('motivo_ingreso') }}">
</div>



<div class="col-auto">
    <label for="estado_actual">Estado</label>
    <select class="form-control" name="estado_actual" id="estado_actual" class="form-control">
        <option> {{ isset($adulto->estado_actual) ? $adulto->estado_actual : old('estado_actual') }}</option>
        <option>Activo</option>
        <option>Inactivo</option>
    </select>
</div>

<div class="col-auto">
    <label id="fecha_salida" style="display: none;">Fecha de salida: <input type="date" name="fecha_salida"
            class="form-control"
            value="{{ isset($adulto->fecha_salida) ? $adulto->fecha_salida : old('fecha_salida') }}"></label>
    <label id="motivo" style="display: none;">Motivo de salida: <input type="text" name="motivo_salida" class="form-control"
            value="{{ isset($adulto->motivo_salida) ? $adulto->motivo_salida : old('motivo_salida') }}"></label>
</div>





<!--BOTONES -->
<div class="row px-3 py-3">
    <div class="col-auto">
        <button class="btn-flat rounded-pill" type="submit" label="{{ $modo }} datos"
            theme="{{ $color }}" icon="fas fa-lg fa-save" />
    </div>
    <div class="col-auto">
        <a class="btn btn-outline-danger" href="{{ url('adulto') }}"> Cancelar</a>
    </div>
</div>



</div>




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
    /* Estilo para el rectángulo verde */
    .green-rectangle {
        background-color: green;
        display: inline-block;
        padding: 5px 10px;
        border-radius: 5px;
    }

    /* Estilo para el texto en negro */
    .black-text {
        color: black;
    }
</style>
