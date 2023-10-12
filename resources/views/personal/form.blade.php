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
        FORMULARIO - PERSONAL OPERATIVO</span>
</h4>

<div class="form-auto px-3 mt-3">
    <h4> <span class="fas fa-user   text-dark"> Nombre del personal:</span> </h4>
</div>

<div class="form-row px-3">
    <div class="col-3">
        <input type="text" name="primer_nombre" id="primer_nombre"
        value="{{ isset($personal->primer_nombre) ? $personal->primer_nombre : old('primer_nombre') }}"
            placeholder="Primer Nombre" class="form-control" required>
    </div>
    <div class="col-3">
        <input type="text"name="segundo_nombre" id="segundo_nombre"
            value="{{ isset($personal->segundo_nombre) ? $personal->segundo_nombre : old('segundo_nombre') }}"
            placeholder="Segundo Nombre" class="form-control" required>
    </div>
    <div class="col-3">
        <input type="text"name="primer_apellido" id="primer_apellido"
        value="{{ isset($personal->primer_apellido) ? $personal->primer_apellido : old('primer_apellido') }}"
            placeholder="Apellido Paterno" class="form-control" required>
    </div>
    <div class="col-3">
        <input type="text"name="segundo_apellido" id="segundo_apellido"
        value="{{ isset($personal->segundo_apellido) ? $personal->segundo_apellido : old('segundo_apellido') }}"
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
        value="{{ isset($personal->DPI) ? $personal->DPI : old('DPI') }}" placeholder="Ingresar DPI"
            class="form-control center" required>
    </div>
    <div class="col-3">
        @if (isset($personal->foto))
            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $personal->foto }}" width="100">
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
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Fecha de nacimiento: 
        </span> </h4>
        <input type="date"name="fecha_nacimiento" id="fecha_nacimiento"
        value="{{ isset($personal->fecha_nacimiento) ? $personal->fecha_nacimiento : old('fecha_nacimiento') }}"
        class="form-control" required>
    </div>
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Edad:</span>
        </h4>
        <input type="number"name="edad" id="edad"
            value="{{ isset($personal->edad) ? $personal->edad : old('edad') }}" class="form-control" required>
    </div>
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Estado civil:</span>
        </h4>
        <select class="form-control" name="estado_civil" id="estado_civil" class="form-control rounded-pill" required>
            <option value="">Seleccione una opción</option>
            <option value="Soltero/a" {{ (isset($personal->estado_civil) && $personal->estado_civil == 'Soltero/a') ? 'selected' : '' }}>Soltero/a</option>
            <option value="Casado/a" {{ (isset($personal->estado_civil) && $personal->estado_civil == 'Casado/a') ? 'selected' : '' }}>Casado/a</option>
            <option value="Divorciado/a" {{ (isset($personal->estado_civil) && $personal->estado_civil == 'Divorciado/a') ? 'selected' : '' }}>Divorciado/a</option>
            <option value="Viudo/a" {{ (isset($personal->estado_civil) && $personal->estado_civil == 'Viudo/a') ? 'selected' : '' }}>Viudo/a</option>
        </select>        
    </div>
</div>

<div class="form-row px-3 mt-4">
    <div class="form-group col-6">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Direccion: 
        </span> </h4>
        <input type="text"name="direccion" id="direccion"
            value="{{ isset($personal->direccion) ? $personal->direccion : old('direccion') }}"
            placeholder="Direccion donde reside" class="form-control" required>
    </div>
    <div class="form-group col-6">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Telefono:</span>
        </h4>
        <input type="text"name="telefono" id="telefono"
            value="{{ isset($personal->telefono) ? $personal->telefono : old('telefono') }}"
            placeholder="Numero telefonico" class="form-control" required>
    </div>
</div>

<h4 class="mt-4"> <span class="text-logo font-weight-bold px-3 mt-6 " style="font-size: 25px; margin-bottom: 5px;">
    INFORMACION DE CONTRATO</span>
</h4>
<div class="form-row px-3 mt-4">
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Titulo academico: 
        </span> </h4>
        <input type="text"name="titulo" id="titulo"
        value="{{ isset($contrato->titulo) ? $contrato->titulo : old('titulo') }}" placeholder="Titulo academico"
        class="form-control" required>
    </div>
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Cargo:</span>
        </h4>
        <input type="text"name="cargo" id="cargo"
            value="{{ isset($contrato->cargo) ? $contrato->cargo : old('cargo') }}" placeholder="Cargo operativo"
            class="form-control" required>
    </div>
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Salario:</span>
        </h4>
        <input type="number"name="salario" id="salario"
        value="{{ isset($contrato->salario) ? $contrato->salario : old('salario') }}"
        placeholder="Monto del Salario" class="form-control" required>     
    </div>
</div>

<div class="form-row px-3 mt-4">
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Aplica Impuesto: 
        </span> </h4>
        <select class="form-control" name="impuesto" id="impuesto" class="form-control rounded-pill" required>
            <option value="">Seleccione una opción</option>
            <option value="Aplica" {{ (isset($contrato->impuesto) && $contrato->impuesto === 'Aplica') ? 'selected' : '' }}>Aplica</option>
            <option value="No aplica" {{ (isset($contrato->impuesto) && $contrato->impuesto === 'No aplica') ? 'selected' : '' }}>No aplica</option>
        </select>        
    </div>
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Identificacion Triburatia / Motivo</span>
        </h4>
        <input type="text"name="sat" id="sat"
            value="{{ isset($contrato->sat) ? $contrato->sat : old('sat') }}" placeholder="Identificacion SAT"
            class="form-control rounded-pill" required>
    </div>
</div>

<div class="form-row px-3 mt-4">
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Fecha Contratacion: 
        </span> </h4>
        <input type="date"name="fecha_contratacion" id="fecha_contratacion"
            value="{{ isset($contrato->fecha_contratacion) ? $contrato->fecha_contratacion : old('fecha_contratacion') }}"
            class="form-control rounded-pill" required>    
    </div>
    <div class="form-group col-4">
        <h4> <span class=" text-dark font-weight-bold" style="font-size: 16px; margin-bottom: 5px;">Estado</span>
        </h4>
        <select class="form-control" name="estado_actual" id="estado_actual" class="form-control rounded-pill" required>
            <option value="">Seleccione una opción</option>
            <option value="Activo" {{ (isset($personal->estado_actual) && $personal->estado_actual === 'Activo') ? 'selected' : '' }}>Activo</option>
            <option value="Inactivo" {{ (isset($personal->estado_actual) && $personal->estado_actual === 'Inactivo') ? 'selected' : '' }}>Inactivo</option>
        </select>        
    </div>
</div>
<div class="col-5">
    <label id="fecha_salida" style="display: none;" class="text-dark">Fecha de salida: <input type="date" name="fecha_salida"
            class="form-control rounded-pill"
            value="{{ isset($personal->fecha_salida) ? $personal->fecha_salida : old('fecha_salida') }}"></label>
</div>



<div class="row px-3 py-3">
    <div class="col-auto">
        <button class="btn btn-outline-success" type="submit">Guardar Datos <i class="fas fa-save"></i></button>
    </div>
<div class="col-auto">
    <a class="btn btn-outline-danger rounded-pill" href="{{ url('personal') }}"> Cancelar</a>
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