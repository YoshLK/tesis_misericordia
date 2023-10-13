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

<h4> <span class="font-weight-bold px-3 mt-6 text-logo text-center" style="font-size: 25px; margin-bottom: 5px;">
        FORMULARIO - UNIVERSITARIO</span>
</h4>

<div class="form-auto px-3 mt-3">
    <h4> <span class="fas fa-user   text-dark"> Nombre del universitario:</span> </h4>
</div>

<div class="form-row px-3">
    <div class="col-3">
        <input type="text" name="primer_nombre" id="primer_nombre"
        value="{{ isset($universitario->primer_nombre) ? $universitario->primer_nombre : old('primer_nombre') }}"
            placeholder="Primer Nombre" class="form-control" required>
    </div>
    <div class="col-3">
        <input type="text"name="segundo_nombre" id="segundo_nombre"
            value="{{ isset($universitario->segundo_nombre) ? $universitario->segundo_nombre : old('segundo_nombre') }}"
            placeholder="Segundo Nombre" class="form-control" required>
    </div>
    <div class="col-3">
        <input type="text"name="primer_apellido" id="primer_apellido"
        value="{{ isset($universitario->primer_apellido) ? $universitario->primer_apellido : old('primer_apellido') }}"
            placeholder="Apellido Paterno" class="form-control" required>
    </div>
    <div class="col-3">
        <input type="text"name="segundo_apellido" id="segundo_apellido"
        value="{{ isset($universitario->segundo_apellido) ? $universitario->segundo_apellido : old('segundo_apellido') }}"
            placeholder="Apellido Materno" class="form-control" required>
    </div>
</div>

<h4 class="mt-4"> <span class="text-logo font-weight-bold px-3 mt-6 " style="font-size: 25px; margin-bottom: 5px;">
    DATOS PERSONALES</span>
</h4>

<div class="form-row px-2 mt-4">
    <div class="col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">DPI</span>
        </h4>
        <input type="text"name="DPI" id="DPI"
        value="{{ isset($universitario->DPI) ? $universitario->DPI : old('DPI') }}" placeholder="Ingresar DPI"
            class="form-control center">
    </div>
    <div class="col-3">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Edad:</span>
        </h4>
        <input type="number"name="edad" id="edad"
            value="{{ isset($universitario->edad) ? $universitario->edad : old('edad') }}" class="form-control" required>
    </div>
    <div class="col-3">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Telefono:</span>
        </h4>
        <input type="text"name="telefono" id="telefono"
            value="{{ isset($universitario->telefono) ? $universitario->telefono : old('telefono') }}" class="form-control"
            placeholder="Numero telefonico de contacto">
    </div>
    
</div>

<div class="form-row px-2 mt-4">
    <div class="col-6">
        <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Universidad / Instituto:</span>
        </h4>
        <input type="text"name="universidad" id="universidad"
        value="{{ isset($universitario->universidad) ? $universitario->universidad : old('universidad') }}" placeholder="Ingresar el nombre de la Universiadad o Instituto"
            class="form-control center">
    </div>
    <div class="col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">No. carnet:</span>
        </h4>
        <input type="text"name="no_carnet" id="no_carnet"
        value="{{ isset($universitario->no_carnet) ? $universitario->no_carnet : old('no_carnet') }}"
        placeholder="Numero de carnete del estudiante" class="form-control">     
    </div>
</div>

<div class="form-row px-3 mt-4">
    
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Tipo practica:</span>
        </h4>
        <input type="text"name="practica" id="practica"
        value="{{ isset($universitario->practica) ? $universitario->practica : old('practica') }}"
        placeholder="Descripcion de la practica" class="form-control">  
    </div>
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Fecha Inicio de la practica:</span>
        </h4>
        <input type="date"name="fecha_incio" id="fecha_incio"
        value="{{ isset($universitario->fecha_incio) ? $universitario->fecha_incio : old('fecha_incio') }}"
        placeholder="Fecha de inicio" class="form-control" required>  
    </div>
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Fecha Finalizacion de la practica:</span>
        </h4>
        <input type="date"name="fecha_final" id="fecha_final"
        value="{{ isset($universitario->fecha_final) ? $universitario->fecha_final : old('fecha_final') }}"
        placeholder="fecha_final" class="form-control">  
    </div>
</div>

 <!--concentimiento-->
 <div class="form-row px-3 mt-3">
    <div class="form-group col-6" name="conciente">
        <label class=" text-dark font-weight-bold" style="font-size: 18px; margin-bottom: 5px;">Firma de consentimiento:</label>
        Sí
        <input type="radio" id="concentimiento_si" name="consentimiento" value="Si"
            {{ (isset($universitario->consentimiento) && $universitario->consentimiento == 'Si') || old('consentimiento') == 'Si' ? 'checked' : '' }}>
        <span class="px-1"></span>
        No<input type="radio" id="concentimiento_no" name="consentimiento" value="No"
            {{ (isset($universitario->consentimiento) && $universitario->consentimiento == 'No') || old('consentimiento') == 'No' ? 'checked' : '' }}>
    </div>
    <div class="form-group col-6" name="no_consentimiento">
        <span class=" text-dark font-weight-bold">No. Consentimento / Motivo:</span>
        <input type="text"name="no_consentimiento" id="no_consentimiento"
            value="{{ isset($universitario->no_consentimiento) ? $universitario->no_consentimiento : old('no_consentimiento') }}"
            placeholder="Numero de consentimiento / Motivo" class="form-control center" >
    </div>
</div>

<div class="col-4">
    <label for="estado_actual" class="text-logo font-weight-bold px-3 mt-6" style="font-size: 25px; margin-bottom: 5px;">Estado</label>
    <select class="form-control" name="estado_actual" id="estado_actual" class="form-control" required>
        <option value="">Seleccione una opción</option>
        <option value="Activo" {{ (isset($universitario->estado_actual) && $universitario->estado_actual == 'Activo') ? 'selected' : '' }}>Activo</option>
        <option value="Inactivo" {{ (isset($universitario->estado_actual) && $universitario->estado_actual == 'Inactivo') ? 'selected' : '' }}>Inactivo</option>
    </select>    
</div>



<div class="row px-3 py-3">
    <div class="col-auto">
        <button class="btn btn-outline-success" type="submit">Guardar Datos <i class="fas fa-save"></i></button>
    </div>
<div class="col-auto">
    <a class="btn btn-outline-danger rounded-pill" href="{{ url('universitario') }}"> Cancelar</a>
</div>   
        
</div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectEstado = document.getElementById('estado_actual');
            const labelInfoAdicional1 = document.getElementById('fecha_salida');

            selectEstado.addEventListener('change', function() {
                if (selectEstado.value === 'Inactivo') {
                    labelInfoAdicional1.style.display = 'block';
                } else {
                    labelInfoAdicional1.style.display = 'none';
                }
            });

            if (selectEstado.value === 'Inactivo') {
                labelInfoAdicional1.style.display = 'block';
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