<?php

namespace App\Http\Controllers;
use DateTime;
use App\Models\Adulto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Adultos;
use App\Models\Responsable;
use App\Models\Condicion;
use App\Models\Ficha;

class AdultoController extends Controller
{   
    function __construct(){
        $this->middleware('permission:ver-adulto',['only'=>['index']]);
        $this->middleware('permission:crear-adulto',['only'=>['create', 'store']]);
        $this->middleware('permission:editar-adulto',['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-adulto',['only'=>['destroy']]);
    }
    // leer VER todos los registros
    public function index()  
    {       
        $datos['adultos'] = Adulto::where('estado_actual', 'Activo')->get();
        
        $conteoTiempo = [];

        foreach ($datos['adultos'] as $adulto)
    {
        $fechaInicio = new DateTime($adulto->fecha_ingreso);
        $fechaFinal = empty($adulto->fecha_salida) ? new DateTime() : new DateTime($adulto->fecha_salida);
        $diferencia = $fechaInicio->diff($fechaFinal);
    
        $anios = floor($diferencia->days / 365);
        $meses = floor(($diferencia->days % 365) / 31);
        $dias_restantes = ($diferencia->days % 365) % 31;

        if ($anios != 0) {
            $aniosText = $anios . ' Años ';
        } else {
            $aniosText = "";
        }
        
        if ($meses != 0) {
            $mesesText = $meses . ' Meses ';
        } else {
            $mesesText = "";
        }
        $conteoTiempo[] = $aniosText . $mesesText . $dias_restantes ." Dias";
    }
        
    return view('adulto.index',$datos,compact('conteoTiempo'));

    }

    // abrir formulario para un nuevo registro
    public function create()
    {
        return view('adulto.create');
    }

    //Recibe datos Guardar en la DB
    public function store(Request $request)
    { /* $datoAdulto = request()->all();
        $datosAdulto = request()->except('_token'); 
        
        return response()->json($datosAdulto );*/
        DB::beginTransaction();
         $campos=[
            'fecha_ingreso' => 'required|date',
            'recibe' => 'required|string|max:150',
            'primer_nombre' => 'required|string|max:20',
            'segundo_nombre' => 'required|string|max:50',
            'primer_apellido' => 'required|string|max:20',
            'segundo_apellido' => 'required|string|max:50',
            'edad' => 'required|integer',
            'fecha_nacimiento' => 'required|date',
            'DPI' => 'required|string|max:25',
            'registro' => 'nullable|string|max:100',
            'lugar_origen' => 'required|string|max:200',
            'domicilio' => 'nullable|string|max:200',
            'iggs' => 'nullable|string|max:10',
            'iggs_identificacion' => 'nullable|string|max:100',
            'cuota' => 'nullable|string|max:10',
            'cuota_monto' => 'nullable|integer',
            'firma_pariente' => 'required|string|max:10',
            'firma_adulto' => 'required|string|max:10',
            'motivo_ingreso' => 'required|string|max:200',
            'estado_actual' => 'required|string|max:25',
            'foto'=>'mimes:jpeg,png,jpg',
            'fecha_salida' => 'nullable|date',
            'motivo_salida' => 'nullable|string|max:200',
            //campos responsable
            'procedencia' => 'required|string|max:50',
            'responsable' => 'required|string|max:200',
            'dpi_encargado' => 'required|string|max:200',
            'telefono' => 'nullable|string|max:25',
            'celular' => 'required|string|max:25',
            'direccion' => 'required|string|max:150',
          
        ];
         $mensaje=[
             'required'=> 'El :attribute es requerido.'
         ];

         $this->validate($request, $campos, $mensaje); 
        
         
        //$datoAdulto = request()->all();
        //$datosAdulto = request()->except('_token');
       
        
        //$a = $request->referencias;
        //print_r($a);
        
        //return response()->json($datosAdulto );
        //Adulto::insert($datosAdulto);
        // redirect('adulto')->with('mensaje','registrado');
        try {
        $adulto = new Adulto;
        $adulto->fecha_ingreso = $request->input('fecha_ingreso');
        $adulto->recibe = $request->input('recibe');
        $adulto->primer_nombre = $request->input('primer_nombre');
        $adulto->segundo_nombre = $request->input('segundo_nombre');
        $adulto->primer_apellido = $request->input('primer_apellido');
        $adulto->segundo_apellido = $request->input('segundo_apellido');
        $adulto->edad = $request->input('edad');
        $adulto->fecha_nacimiento = $request->input('fecha_nacimiento');
        $adulto->DPI = $request->input('DPI');
        $adulto->registro = $request->input('registro');
        $adulto->lugar_origen = $request->input('lugar_origen');
        $adulto->domicilio = $request->input('domicilio');
        $adulto->iggs = $request->input('iggs');
        $adulto->iggs_identificacion = $request->input('iggs_identificacion');
        $adulto->cuota = $request->input('cuota');
        $adulto->cuota_monto = $request->input('cuota_monto');
        $adulto->firma_pariente = $request->input('firma_pariente');
        $adulto->firma_adulto = $request->input('firma_adulto');
        $adulto->motivo_ingreso = $request->input('motivo_ingreso');
        $adulto->estado_actual = $request->input('estado_actual');
        $adulto->fecha_salida = $request->input('fecha_salida');
        //$adulto->foto = $request->input('foto');
        if ($request->hasFile('foto')){
            $adulto['foto'] = $request->file('foto')->store('uploads','public');
        } 
        $adulto->save();

        $responsable = new Responsable;
        $responsable->procedencia = $request->input('procedencia');
        $responsable->responsable = $request->input('responsable');
        $responsable->dpi_encargado = $request->input('dpi_encargado');
        $responsable->telefono = $request->input('telefono');
        $responsable->celular = $request->input('celular');
        $responsable->direccion = $request->input('direccion');
        $responsable->adulto_id = $adulto->id;
        $responsable->save();

        $condicionFisica = new Condicion;
        $condicionFisica->conciente = $request->input('conciente');
        $condicionFisica->camina = $request->input('camina');
        $condicionFisica->habla = $request->input('habla');
        $condicionFisica->vidente = $request->input('vidente');
        $condicionFisica->dificultad_motora = $request->input('dificultad_motora');
        $condicionFisica->observaciones = $request->input('observaciones');
        $condicionFisica->adulto_id = $adulto->id;
        $condicionFisica->save();

        $ficha = new Ficha;
        $ficha->enfermedad = $request->input('enfermedad');
        $ficha->enfermedad_nombre = $request->input('enfermedad_nombre');
        $ficha->medicamento = $request->input('medicamento');
        $ficha->medicamento_nombre = $request->input('medicamento_nombre');
        $ficha->duerme = $request->input('duerme');
        $ficha->tic = $request->input('tic');
        $ficha->tic_nombre = $request->input('tic_nombre');
        $ficha->necesidades = $request->input('necesidades');
        $ficha->operacion = $request->input('operacion');
        $ficha->operacion_nombre = $request->input('operacion_nombre');
        $ficha->alchol = $request->input('alchol');
        $ficha->fuma = $request->input('fuma');
        $ficha->alergia_m = $request->input('alergia_m');
        $ficha->alergia_medicina = $request->input('alergia_medicina');
        $ficha->alergia_c = $request->input('alergia_c');
        $ficha->alergia_comida = $request->input('alergia_comida');
        $ficha->fractura = $request->input('fractura');
        $ficha->fractura_donde = $request->input('fractura_donde');
        $ficha->cicatriz = $request->input('cicatriz');
        $ficha->cicatriz_donde = $request->input('cicatriz_donde');
        $ficha->tatuaje = $request->input('tatuaje');
        $ficha->tatuaje_donde = $request->input('tatuaje_donde');
        $ficha->herida = $request->input('herida');
        $ficha->herida_donde = $request->input('herida_donde');
        $ficha->fecha = $request->input('fecha');
        $ficha->nombre = $request->input('nombre');
        $ficha->lugar = $request->input('lugar');
        $ficha->adulto_id = $adulto->id;

        
        if ($ficha->enfermedad === 'No') {
            $ficha->enfermedad = null;
            $ficha->enfermedad_nombre = null;
        }

        if ($ficha->medicamento === 'No') {
            $ficha->medicamento = null;
            $ficha->medicamento_nombre = null;
        }
        if ($ficha->tic === 'No') {
            $ficha->tic = null;
            $ficha->tic_nombre = null;
        }
        if ($ficha->operacion === 'No') {
            $ficha->operacion = null;
            $ficha->operacion_nombre = null;
        }
        if ($ficha->alergia_m === 'No') {
            $ficha->alergia_m = null;
            $ficha->alergia_medicina = null;
        }
        if ($ficha->alergia_c === 'No') {
            $ficha->alergia_c = null;
            $ficha->alergia_comida = null;
        }

        if ($ficha->fractura === 'No') {
            $ficha->fractura = null;
            $ficha->fractura_donde = null;
        }
        if ($ficha->cicatriz === 'No') {
            $ficha->cicatriz = null;
            $ficha->cicatriz_donde = null;
        }
        if ($ficha->tatuaje === 'No') {
            $ficha->tatuaje = null;
            $ficha->tatuaje_donde = null;
        }
        if ($ficha->herida === 'No') {
            $ficha->herida = null;
            $ficha->herida_donde = null;
        }

        $ficha->save();

        DB::commit();
        return redirect('adulto')->with('mensaje','registrado');

    } catch (\Exception $e) {
        // Revertir la transacción en caso de error
        DB::rollback();
        return redirect('adulto')->with('mensaje', 'error');
    } 
    }
   
    // Visualizar detalle de un solo registro
    public function show(Adulto $adulto)
    {
        //$adulto=Adulto::where('id','=',$id)->first();
        //return view('adulto.inactivo');
    }

     // abrir formulario para edicion
    public function edit($id)
    {
        $adulto=Adulto::findOrFail($id);

        $responsable = $adulto->responsable;
        $condicion = $adulto->condicionFisica;
        $ficha = $adulto->ficha;
        return view('adulto.edit', compact('adulto', 'responsable', 'condicion', 'ficha'));
    }

    // Actualizar la informacion editada
    public function update(Request $request, $id)
    {
        $campos=[
            'fecha_ingreso' => 'required|date',
            'recibe' => 'required|string|max:150',
            'primer_nombre' => 'required|string|max:20',
            'segundo_nombre' => 'required|string|max:50',
            'primer_apellido' => 'required|string|max:20',
            'segundo_apellido' => 'required|string|max:50',
            'edad' => 'required|integer',
            'fecha_nacimiento' => 'required|date',
            'DPI' => 'required|string|max:25',
            'registro' => 'nullable|string|max:100',
            'lugar_origen' => 'required|string|max:200',
            'domicilio' => 'nullable|string|max:200',
            'iggs' => 'nullable|string|max:10',
            'iggs_identificacion' => 'nullable|string|max:100',
            'cuota' => 'nullable|string|max:10',
            'cuota_monto' => 'nullable|integer',
            'firma_pariente' => 'required|string|max:10',
            'firma_adulto' => 'required|string|max:10',
            'motivo_ingreso' => 'required|string|max:200',
            'estado_actual' => 'required|string|max:25',
            'foto'=>'mimes:jpeg,png,jpg',
            'fecha_salida' => 'nullable|date',
            'motivo_salida' => 'nullable|string|max:200',
            //campos responsable
            'procedencia' => 'required|string|max:50',
            'responsable' => 'required|string|max:200',
            'dpi_encargado' => 'required|string|max:200',
            'telefono' => 'nullable|string|max:25',
            'celular' => 'required|string|max:25',
            'direccion' => 'required|string|max:150',
            //campos condicion fisica
            'conciente' => 'nullable|string|max:5',
            'camina' => 'nullable|string|max:5',
            'habla' => 'nullable|string|max:5',
            'vidente' => 'nullable|string|max:25',
            'dificultad_motora' => 'nullable|string|max:20',
            'observaciones' => 'nullable|string|max:250',
            'enfermedad_nombre' => 'nullable|string|max:250'
        ];
         $mensaje=[
             'required'=> 'El :attribute es requerido.'
         ];

         $this->validate($request, $campos, $mensaje); 
        

         DB::beginTransaction();
         try {
        // nueva actualizacion 
        $adulto = Adulto::findOrFail($id);
        $adulto->fecha_ingreso = $request->input('fecha_ingreso');
        $adulto->recibe = $request->input('recibe');
        $adulto->primer_nombre = $request->input('primer_nombre');
        $adulto->segundo_nombre = $request->input('segundo_nombre');
        $adulto->primer_apellido = $request->input('primer_apellido');
        $adulto->segundo_apellido = $request->input('segundo_apellido');
        $adulto->edad = $request->input('edad');
        $adulto->fecha_nacimiento = $request->input('fecha_nacimiento');
        $adulto->DPI = $request->input('DPI');
        $adulto->registro = $request->input('registro');
        $adulto->lugar_origen = $request->input('lugar_origen');
        $adulto->domicilio = $request->input('domicilio');
        $adulto->iggs = $request->input('iggs');
        $adulto->iggs_identificacion = $request->input('iggs_identificacion');
        $adulto->cuota = $request->input('cuota');
        $adulto->cuota_monto = $request->input('cuota_monto');
        $adulto->firma_pariente = $request->input('firma_pariente');
        $adulto->firma_adulto = $request->input('firma_adulto');
        $adulto->motivo_ingreso = $request->input('motivo_ingreso');
        $adulto->estado_actual = $request->input('estado_actual');
        $adulto->fecha_salida = $request->input('fecha_salida');

        if ($request->hasFile('foto')){
            $adultoFoto=Adulto::findOrFail($id);
            Storage::delete('public/'.$adultoFoto->foto);
            $adulto['foto'] = $request->file('foto')->store('uploads','public');
        }
        if ($adulto->iggs === 'No') {
            $adulto->iggs_identificacion = null;
        }

        if ( $adulto->cuota === 'No') {
            $adulto->cuota_monto  = null;
        }
        $adulto->save();

        $responsable = $adulto->responsable;
        $responsable->procedencia = $request->input('procedencia');
        $responsable->responsable = $request->input('responsable');
        $responsable->dpi_encargado = $request->input('dpi_encargado');
        $responsable->telefono = $request->input('telefono');
        $responsable->celular = $request->input('celular');
        $responsable->direccion = $request->input('direccion');
        $responsable->save();

        $condicion = $adulto->condicionFisica;
        $condicion->conciente = $request->input('conciente');
        $condicion->camina = $request->input('camina');
        $condicion->habla = $request->input('habla');
        $condicion->vidente = $request->input('vidente');
        $condicion->dificultad_motora = $request->input('dificultad_motora');
        $condicion->observaciones = $request->input('observaciones');
        $condicion->save();

        $ficha = $adulto->ficha;
        $ficha->enfermedad = $request->input('enfermedad');
        $ficha->enfermedad_nombre = $request->input('enfermedad_nombre');
        $ficha->medicamento = $request->input('medicamento');
        $ficha->medicamento_nombre = $request->input('medicamento_nombre');
        $ficha->tic = $request->input('tic');
        $ficha->tic_nombre = $request->input('tic_nombre');
        $ficha->operacion = $request->input('operacion');
        $ficha->operacion_nombre = $request->input('operacion_nombre');
        $ficha->alergia_m = $request->input('alergia_m');
        $ficha->alergia_medicina = $request->input('alergia_medicina');
        $ficha->alergia_c = $request->input('alergia_c');
        $ficha->alergia_comida = $request->input('alergia_comida');
        $ficha->fractura = $request->input('fractura');
        $ficha->fractura_donde = $request->input('fractura_donde');
        $ficha->cicatriz = $request->input('cicatriz');
        $ficha->cicatriz_donde = $request->input('cicatriz_donde');
        $ficha->tatuaje = $request->input('tatuaje');
        $ficha->tatuaje_donde = $request->input('tatuaje_donde');
        $ficha->herida = $request->input('herida');
        $ficha->herida_donde = $request->input('herida_donde');
        $ficha->fecha = $request->input('fecha');
        $ficha->nombre = $request->input('nombre');
        $ficha->lugar = $request->input('lugar');
        $ficha->duerme = $request->input('duerme');
        $ficha->necesidades = $request->input('necesidades');
        $ficha->alchol = $request->input('alchol');
        $ficha->fuma = $request->input('fuma');
        $ficha->adulto_id = $adulto->id;

        if ($ficha->enfermedad === 'No') {
            $ficha->enfermedad = null;
            $ficha->enfermedad_nombre = null;
        }

        if ($ficha->medicamento === 'No') {
            $ficha->medicamento = null;
            $ficha->medicamento_nombre = null;
        }
        if ($ficha->tic === 'No') {
            $ficha->tic = null;
            $ficha->tic_nombre = null;
        }
        if ($ficha->operacion === 'No') {
            $ficha->operacion = null;
            $ficha->operacion_nombre = null;
        }
        if ($ficha->alergia_m === 'No') {
            $ficha->alergia_m = null;
            $ficha->alergia_medicina = null;
        }
        if ($ficha->alergia_c === 'No') {
            $ficha->alergia_c = null;
            $ficha->alergia_comida = null;
        }

        if ($ficha->fractura === 'No') {
            $ficha->fractura = null;
            $ficha->fractura_donde = null;
        }
        if ($ficha->cicatriz === 'No') {
            $ficha->cicatriz = null;
            $ficha->cicatriz_donde = null;
        }
        if ($ficha->tatuaje === 'No') {
            $ficha->tatuaje = null;
            $ficha->tatuaje_donde = null;
        }
        if ($ficha->herida === 'No') {
            $ficha->herida = null;
            $ficha->herida_donde = null;
        }

        $ficha->save();

        DB::commit();
        return redirect('adulto')->with('mensaje','editado');
    } catch (\Exception $e) {
        // Revertir la transacción en caso de error
        DB::rollback();
        return redirect('adulto')->with('mensaje', 'error');
    }
        //$datosAdulto = request()->except(['_token','_method']);
        
        /* if ($request->hasFile('foto')){
            $adulto=Adulto::findOrFail($id);
            Storage::delete('public/'.$adulto->foto);
            $datosAdulto['foto'] = $request->file('foto')->store('uploads','public');
        }

         if ($request->hasFile('foto')){
            $adulto=Adulto::findOrFail($id);
             Storage::delete('public/'.$adulto->foto);
             $datosAdulto['foto'] = $request->file('foto')->store('uploads','public');
         } */

        
        /* Adulto::where('id','=',$id)->update($datosAdulto);
        $adulto=Adulto::findOrFail($id);
        return redirect('adulto')->with('mensaje','editado'); */
    }

    // eliminar registro
    public function destroy(Request $request)
    {   
        $ruta = $request->input('ruta');
        $id = $request->input('id');
        $adulto=Adulto::findOrFail($id);
        if (Storage::delete('public/'.$adulto->foto)){
            Adulto::destroy($id);
        }else if ($adulto->id=$id){
            Adulto::destroy($id);
        }
        $rutaDireccion = $ruta ? 'adulto.' . $ruta : 'adulto.index';
        return redirect()->route($rutaDireccion)->with('mensaje', 'eliminado');
    } 

    //inactivo
    public function inactivo()
{
    //$adultosInactivos = Adulto::where('estado_actual', '')->get();
    $adultosInactivos['adultosInactivos'] = Adulto::where('estado_actual', 'Inactivo')->get();
    
     $conteoTiempo = [];

     foreach ($adultosInactivos['adultosInactivos'] as $adulto)
     {
     $fechaInicio = new DateTime($adulto->fecha_ingreso);
     $fechaFinal = empty($adulto->fecha_salida) ? new DateTime() : new DateTime($adulto->fecha_salida);
     $diferencia = $fechaInicio->diff($fechaFinal);

     $anios = floor($diferencia->days / 365);
     $meses = floor(($diferencia->days % 365) / 31);
     $dias_restantes = ($diferencia->days % 365) % 31;

     if ($anios != 0) {
         $aniosText = $anios . ' Años ';
     } else {
         $aniosText = "";
     }
    
     if ($meses != 0) {
         $mesesText = $meses . ' Meses ';
     } else {
         $mesesText = "";
     }
     $conteoTiempo[] = $aniosText . $mesesText . $dias_restantes ." Dias";
     }

     return view('adulto.inactivo',$adultosInactivos, compact('conteoTiempo'));
     }
    
}

