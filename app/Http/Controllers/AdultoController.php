<?php

namespace App\Http\Controllers;
use DateTime;
use App\Models\Adulto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Adultos;

class AdultoController extends Controller
{   
    function __construct(){
        $this->middleware('permission:ver-adulto|crear-adulto|editar-adulto|borrar-adulto', ['only'=>['index']]);
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
        $conteoTiempo[] = $aniosText . $mesesText . $dias_restantes ." Dias". " @". $diferencia->days;
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
    {
        //validacion de campos
        //  $campos=[
        //      'primer_nombre'=>'required|string|max:20',
        //      'segundo_nombre'=>'required|string|max:50',
        //      'primer_apellido'=>'required|string|max:20',
        //      'segundo_apellido'=>'required|string|max:50',
        //      'fecha_ingreso'=>'required|date',
        // //     'DPI'=>'required|string|max:13',
        //      'procedencia'=>'required|string|max:100',
        //      'fecha_nacimiento'=>'required|date',
        //      'edad'=>'required|integer',
        //     'estado_actual'=>'required|string|max:25',
        //      'foto'=>'mimes:jpeg,png,jpg',
        //  ];

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
            'iggs' => 'required|string|max:10',
            'iggs_identificacion' => 'nullable|string|max:100',
            'cuota' => 'required|string|max:10',
            'cuota_monto' => 'nullable|integer',
            'firma_pariente' => 'required|string|max:10',
            'firma_adulto' => 'required|string|max:10',
            'Motivo_ingreso' => 'required|string|max:10',
            'estado_actual' => 'required|string|max:25',
            'foto'=>'mimes:jpeg,png,jpg',
            'fecha_salida' => 'nullable|date',
            'motivo' => 'nullable|string|max:200',
        ];



         $mensaje=[
             'required'=> 'El :attribute es requerido.'
         ];

         $this->validate($request, $campos, $mensaje);
        
        //$datoAdulto = request()->all();
        $datosAdulto = request()->except('_token');
       
        if ($request->hasFile('foto')){
            $datosAdulto['foto'] = $request->file('foto')->store('uploads','public');
        }
        //$a = $request->referencias;
        //print_r($a);
        
        //return response()->json($datosAdulto );
        Adulto::insert($datosAdulto);
        return redirect('adulto')->with('mensaje','registrado');
        
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
        return view('adulto.edit', compact('adulto'));
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
            'iggs' => 'required|string|max:10',
            'iggs_identificacion' => 'nullable|string|max:100',
            'cuota' => 'required|string|max:10',
            'cuota_monto' => 'nullable|integer',
            'firma_pariente' => 'required|string|max:10',
            'firma_adulto' => 'required|string|max:10',
            'Motivo_ingreso' => 'required|string|max:10',
            'estado_actual' => 'required|string|max:25',
            'foto'=>'mimes:jpeg,png,jpg',
            'fecha_salida' => 'nullable|date',
            'motivo' => 'nullable|string|max:200',
        ];

        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);

        $datosAdulto = request()->except(['_token','_method']);
        
        if ($request->hasFile('foto')){
            $adulto=Adulto::findOrFail($id);
            Storage::delete('public/'.$adulto->foto);
            $datosAdulto['foto'] = $request->file('foto')->store('uploads','public');
        }

        // if ($request->hasFile('foto')){
        //     $adulto=Adulto::findOrFail($id);
        //     Storage::delete('public/'.$adulto->foto);
        //     $datosAdulto['foto'] = $request->file('foto')->store('uploads','public');
        // }

        if ($datosAdulto['iggs'] === 'no') {
            $datosAdulto['iggs_identificacion'] = null;
        }

        if ($datosAdulto['cuota'] === 'no') {
            $datosAdulto['cuota_monto'] = null;
        }
        
        Adulto::where('id','=',$id)->update($datosAdulto);
        $adulto=Adulto::findOrFail($id);
        return redirect('adulto')->with('mensaje','editado');
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

