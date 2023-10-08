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


<div class="form-group ">
    <label for="fecha_ingreso">Fecha de Ingreso:</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
            <i class="far fa-calendar"></i>
        </div>
      </div> 
      <input id="fecha_ingreso" name="fecha_ingreso" placeholder="Fecha de ingreso" type="text" aria-describedby="fecha_ingresoHelpBlock" required="required" class="form-control">
    </div> 
    <span id="fecha_ingresoHelpBlock" class="form-text text-muted">Ingresar la fecha de ingreso del adulto mayor.</span>
  </div> 

<form>

    
    <!-- Campo Fecha de Ingreso -->
    <div class="mb-3 " >
        <label for="fechaIngreso" class="form-label bg-success text-black p-2 far fa-calendar"> </i>Fecha de Ingreso</label>
        <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso">
    </div>
    
    <!-- Campo Persona quien lo recibe -->
    <div class="mb-3">
        <label for="personaRecibe" class="form-label">Persona quien lo recibe</label>
        <input type="text" class="form-control" id="personaRecibe" name="personaRecibe">
    </div>
    
    <!-- Campo Edad -->
    <div class="mb-3">
        <label for="edad" class="form-label">Edad</label>
        <input type="number" class="form-control" id="edad" name="edad">
    </div>
    
    <!-- Campo Fecha de Nacimiento -->
    <div class="mb-3">
        <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento">
    </div>
    
    <!-- Campo DPI o Cédula -->
    <div class="mb-3">
        <label for="dpiCedula" class="form-label">DPI o Cédula</label>
        <input type="text" class="form-control" id="dpiCedula" name="dpiCedula">
    </div>
    
    <!-- Campo Registro -->
    <div class="mb-3">
        <label for="registro" class="form-label">Registro</label>
        <input type="text" class="form-control" id="registro" name="registro">
    </div>
    
    <!-- Campo Lugar de Origen -->
    <div class="mb-3">
        <label for="lugarOrigen" class="form-label">Lugar de Origen</label>
        <input type="text" class="form-control" id="lugarOrigen" name="lugarOrigen">
    </div>
    
    <!-- Campo Domicilio -->
    <div class="mb-3">
        <label for="domicilio" class="form-label">Domicilio</label>
        <textarea class="form-control" id="domicilio" name="domicilio" rows="3"></textarea>
    </div>
    
    <!-- Botón de Envío -->
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


<div class="row-auto px-5 mt-2">
    <div class="col-3 ">
       <label for="fecha_ingreso" style="color:black">Fecha de Ingreso</label>
    <input type="date"name="fecha_ingreso" id="fecha_ingreso"
            value="{{ isset($adulto->fecha_ingreso) ? $adulto->fecha_ingreso : old('fecha_ingreso') }}"
            class="form-control rounded-pill">
</div>
</div>
<div class="row-auto px-5 mt-2">
    <h4> <span class="fas fa-user  {{ $ColorFormato }}" style="color:black"> Nombre del adulto mayor</span> </h4>
</div>

<div class="row">
    <div class="col-3">
        <input type="text" name="primer_nombre" id="primer_nombre"
            value="{{ isset($adulto->primer_nombre) ? $adulto->primer_nombre : old('primer_nombre') }}"
            placeholder="Primer Nombre" class="form-control rounded-pill">
    </div>
    <div class="col-3">
        <input type="text"name="segundo_nombre" id="segundo_nombre"
            value="{{ isset($adulto->segundo_nombre) ? $adulto->segundo_nombre : old('segundo_nombre') }}"
            placeholder="Segundo Nombre" class="form-control rounded-pill">
    </div>
    <div class="col-3">
        <input type="text"name="primer_apellido" id="primer_apellido"
            value="{{ isset($adulto->primer_apellido) ? $adulto->primer_apellido : old('primer_apellido') }}"
            placeholder="Apellido Paterno" class="form-control rounded-pill">
    </div>
    <div class="col-3">
        <input type="text"name="segundo_apellido" id="segundo_apellido"
            value="{{ isset($adulto->segundo_apellido) ? $adulto->segundo_apellido : old('segundo_apellido') }}"
            placeholder="Apellido Materno" class="form-control rounded-pill">
    </div>
</div>
<div class="row-auto px-2 py-3">
    <h3> <span class="fas fa-address-card {{ $ColorFormato }}"> Credenciales</span> </h3>
</div>
<div class="row">
    <div class="col-2">
        <label for="DPI">DPI</label>
        <input type="text"name="DPI" id="DPI" value="{{ isset($adulto->DPI) ? $adulto->DPI : old('DPI') }}"
            placeholder="Ingresar DPI" class="form-control rounded-pill center">
    </div>
    <div class="col-2">
        <label for="procedencia">Referido</label>
        <select class="form-control" name="procedencia" id="procedencia" class="form-control rounded-pill">
            <option>{{ isset($adulto->procedencia) ? $adulto->procedencia : old('procedencia') }}</option>
            <option>No Referido</option>
            <option>PNC</option>
            <option>BCVBG</option>
            <option>HRO</option>
        </select>
    </div>
    <div class="col-4">
        @if (isset($adulto->foto))
            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $adulto->foto }}" width="100">
        @endif
        <label for="foto" class="px-2">Fotografia</label>
        <input type="file" name="foto" id="selectFoto" accept="image/*"
            class="form-control rounded-pill btn-outline-primary">
    </div>
    <div class="col-2">
        <label id="cambio" style="display: none;">Remplazo
        <img class="mw-100" id="viewFoto"></label>
    </div>
</div>
<div class="row-auto px-2 py-3">
    <h3> <span class="fas fa-user {{ $ColorFormato }}"> Iformacion adicional</span> </h3>
</div>
<div class="row">
    <div class="col-auto">
        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
        <input type="date"name="fecha_nacimiento" id="fecha_nacimiento"
            value="{{ isset($adulto->fecha_nacimiento) ? $adulto->fecha_nacimiento : old('fecha_nacimiento') }}"
            class="form-control rounded-pill">
    </div>
    <div class="col-2">
        <label for="edad">Edad</label>
        <input type="number"name="edad" id="edad"
            value="{{ isset($adulto->edad) ? $adulto->edad : old('edad') }}" class="form-control rounded-pill">
    </div>
    
    <div class="col-auto">
        <label for="estado_actual">Estado</label>
        <select class="form-control" name="estado_actual" id="estado_actual" class="form-control rounded-pill">
            <option> {{ isset($adulto->estado_actual) ? $adulto->estado_actual : old('estado_actual') }}</option>
            <option>Activo</option>
            <option>Inactivo</option>
        </select>
    </div>

    <div class="col-auto">
        <label id="fecha_salida" style="display: none;">Fecha de salida: <input type="date" name="fecha_salida"
                class="form-control rounded-pill"
                value="{{ isset($adulto->fecha_salida) ? $adulto->fecha_salida : old('fecha_salida') }}"></label>
        <label id="motivo" style="display: none;">Motivo: <input type="text" name="motivo"
                class="form-control rounded-pill"
                value="{{ isset($adulto->motivo) ? $adulto->motivo : old('motivo') }}"></label>
    </div>
</div>

<div class="row px-3 py-3">
    <div class="col-auto">
        <button class="btn-flat rounded-pill" type="submit" label="{{ $modo }} datos"
            theme="{{ $color }}" icon="fas fa-lg fa-save" />
    </div>
    <div class="col-auto">
        <a class="btn btn-outline-danger rounded-pill" href="{{ url('adulto') }}"> Cancelar</a>
    </div>
</div>

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectEstado = document.getElementById('estado_actual');
            const labelInfoAdicional1 = document.getElementById('fecha_salida');
            const labelInfoAdicional2 = document.getElementById('motivo');

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

@stop


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