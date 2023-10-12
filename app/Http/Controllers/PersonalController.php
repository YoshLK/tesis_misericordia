<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Contrato;

class PersonalController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-personal',['only'=>['index']]);
        $this->middleware('permission:crear-personal',['only'=>['create', 'store']]);
        $this->middleware('permission:editar-personal',['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-personal',['only'=>['destroy']]);
    }

    public function index()
    {
        $datos['personals'] = Personal::where('estado_actual', 'Activo')->get(); 
        $conteoTiempo = [];

        foreach ($datos['personals'] as $personal)
    {
        $fechaInicio = new DateTime($personal->contrato->fecha_contratacion);
        $fechaFinal = empty($personal->fecha_salida) ? new DateTime() : new DateTime($personal->fecha_salida);
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

    return view('personal.index',$datos, compact('conteoTiempo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'primer_nombre'=>'required|string|max:20',
            'segundo_nombre'=>'required|string|max:50',
            'primer_apellido'=>'required|string|max:20',
            'segundo_apellido'=>'required|string|max:50',
            'DPI'=>'required|string|max:13',
            'estado_civil'=>'required|string|max:50',
            'foto'=>'mimes:jpeg,png,jpg',
            'fecha_nacimiento'=>'required|date',
            'edad'=>'required|integer',
            'fecha_contratacion'=>'required|date',
            'direccion'=>'required|string|max:150',
            'telefono'=>'required|string|max:25',
            'titulo'=>'required|string|max:50',
            'cargo'=>'required|string|max:50',
            'salario'=>'required|integer',
            'cargo'=>'required|string|max:20',
            'sat'=>'required|string|max:150',
            'estado_actual'=>'required|string|max:20',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);
        
        $personal = new Personal;
        $personal->primer_nombre = $request->input('primer_nombre');
        $personal->segundo_nombre = $request->input('segundo_nombre');
        $personal->primer_apellido = $request->input('primer_apellido');
        $personal->segundo_apellido = $request->input('segundo_apellido');
        $personal->DPI = $request->input('DPI');
        $personal->fecha_nacimiento = $request->input('fecha_nacimiento');
        $personal->estado_civil = $request->input('estado_civil');
        $personal->direccion = $request->input('direccion');
        $personal->telefono = $request->input('telefono');
        $personal->edad = $request->input('edad');
        $personal->estado_actual = $request->input('estado_actual');
        $personal->fecha_salida = $request->input('fecha_salida');

        if ($request->hasFile('foto')){
            $personal['foto'] = $request->file('foto')->store('uploads','public');
        } 

        $personal->save();

        $contrato = new Contrato;

        $contrato->fecha_contratacion = $request->input('fecha_contratacion');
        $contrato->cargo = $request->input('cargo');
        $contrato->titulo = $request->input('titulo');
        $contrato->salario = $request->input('salario');
        $contrato->impuesto = $request->input('impuesto');
        $contrato->sat = $request->input('sat');
        $contrato->personal_id = $personal->id;
        $contrato->save();


        return redirect('personal')->with('mensaje','registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $personal=Personal::findOrFail($id);
        $contrato = $personal->contrato;
        return view('personal.edit', compact('personal', 'contrato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'primer_nombre'=>'required|string|max:20',
            'segundo_nombre'=>'required|string|max:50',
            'primer_apellido'=>'required|string|max:20',
            'segundo_apellido'=>'required|string|max:50',
            'DPI'=>'required|string|max:13',
            'estado_civil'=>'required|string|max:50',
            'foto'=>'mimes:jpeg,png,jpg',
            'fecha_nacimiento'=>'required|date',
            'edad'=>'required|integer',
            'fecha_contratacion'=>'required|date',
            'direccion'=>'required|string|max:150',
            'telefono'=>'required|string|max:25',
            'titulo'=>'required|string|max:50',
            'cargo'=>'required|string|max:50',
            'salario'=>'required|integer',
            'cargo'=>'required|string|max:20',
            'sat'=>'required|string|max:150',
            'estado_actual'=>'required|string|max:20',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);

        $personal = Personal::findOrFail($id);
        $personal->primer_nombre = $request->input('primer_nombre');
        $personal->segundo_nombre = $request->input('segundo_nombre');
        $personal->primer_apellido = $request->input('primer_apellido');
        $personal->segundo_apellido = $request->input('segundo_apellido');
        $personal->DPI = $request->input('DPI');
        $personal->fecha_nacimiento = $request->input('fecha_nacimiento');
        $personal->estado_civil = $request->input('estado_civil');
        $personal->direccion = $request->input('direccion');
        $personal->telefono = $request->input('telefono');
        $personal->edad = $request->input('edad');
        $personal->estado_actual = $request->input('estado_actual');
        $personal->fecha_salida = $request->input('fecha_salida');

        if ($request->hasFile('foto')){
            $personalFoto=Personal::findOrFail($id);
            Storage::delete('public/'.$personalFoto->foto);
            $personal['foto'] = $request->file('foto')->store('uploads','public');
        }
        $personal->save();

        $contrato = $personal->contrato;
        $contrato->fecha_contratacion = $request->input('fecha_contratacion');
        $contrato->cargo = $request->input('cargo');
        $contrato->titulo = $request->input('titulo');
        $contrato->salario = $request->input('salario');
        $contrato->impuesto = $request->input('impuesto');
        $contrato->sat = $request->input('sat');
        $contrato->save();

        return redirect('/general/personal_detalle/'.$personal->id)->with('mensaje','editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $ruta = $request->input('ruta');
        $id = $request->input('id');
        $personal=Personal::findOrFail($id);
        if (Storage::delete('public/'.$personal->foto)){
            Personal::destroy($id);
        }else if ($personal->id=$id){
            Personal::destroy($id);
        }
        $rutaDireccion = $ruta ? 'personal.' . $ruta : 'personal.index';
        return redirect()->route($rutaDireccion)->with('mensaje', 'eliminado');
    }

    public function inactivo()
{
    $personalInactivos['personalInactivos'] = Personal::where('estado_actual', 'Inactivo')->get(); 
        $conteoTiempo = [];

        foreach ($personalInactivos['personalInactivos'] as $personal)
    {
        $fechaInicio = new DateTime($personal->contrato->fecha_contratacion);
        $fechaFinal = empty($personal->fecha_salida) ? new DateTime() : new DateTime($personal->fecha_salida);
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

    return view('personal.inactivo',$personalInactivos, compact('conteoTiempo'));
     }
}