<?php

namespace App\Http\Controllers;

use App\Models\Universitario;
use Illuminate\Http\Request;


class UniversitarioController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-universitario',['only'=>['index']]);
        $this->middleware('permission:crear-universitario',['only'=>['create', 'store']]);
        $this->middleware('permission:editar-universitario',['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-universitario',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['universitarios'] = Universitario::where('estado_actual', 'Activo')->get();
        return view('universitario.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('universitario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'primer_nombre' => 'required|string|max:20',
            'segundo_nombre' => 'required|string|max:50',
            'primer_apellido' => 'required|string|max:20',
            'segundo_apellido' => 'required|string|max:50',
            'DPI' => 'nullable|string|max:15',
            'edad' => 'required|integer',
            'telefono' => 'nullable|string|max:20',
            'universidad' => 'nullable|string|max:200',
            'no_carnet' => 'nullable|string|max:50',
            'practica' => 'nullable|string|max:250',
            'fecha_incio' => 'required|date',
            'fecha_final' => 'nullable|date',
            'consentimiento' => 'nullable|string|max:10',
            'no_consentimiento' => 'nullable|string|max:100',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);

        $universitario = new Universitario;
        $universitario->primer_nombre = $request->input('primer_nombre');
        $universitario->segundo_nombre = $request->input('segundo_nombre');
        $universitario->primer_apellido = $request->input('primer_apellido');
        $universitario->segundo_apellido = $request->input('segundo_apellido');
        $universitario->DPI = $request->input('DPI');
        $universitario->edad = $request->input('edad');
        $universitario->telefono = $request->input('telefono');
        $universitario->universidad = $request->input('universidad');
        $universitario->no_carnet = $request->input('no_carnet');
        $universitario->practica = $request->input('practica');
        $universitario->fecha_incio = $request->input('fecha_incio');
        $universitario->fecha_final = $request->input('fecha_final');
        $universitario->consentimiento = $request->input('consentimiento');
        $universitario->no_consentimiento = $request->input('no_consentimiento');
        $universitario->estado_actual = $request->input('estado_actual');

  
        $universitario->save();
        return redirect('universitario')->with('mensaje','registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Universitario  $universitario
     * @return \Illuminate\Http\Response
     */
    public function show(Universitario $universitario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Universitario  $universitario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $universitario=Universitario::findOrFail($id);
        return view('universitario.edit', compact('universitario',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Universitario  $universitario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'primer_nombre' => 'required|string|max:20',
            'segundo_nombre' => 'required|string|max:50',
            'primer_apellido' => 'required|string|max:20',
            'segundo_apellido' => 'required|string|max:50',
            'DPI' => 'nullable|string|max:15',
            'edad' => 'required|integer',
            'telefono' => 'nullable|string|max:20',
            'universidad' => 'nullable|string|max:200',
            'no_carnet' => 'nullable|string|max:50',
            'practica' => 'nullable|string|max:250',
            'fecha_incio' => 'required|date',
            'fecha_final' => 'nullable|date',
            'consentimiento' => 'nullable|string|max:10',
            'no_consentimiento' => 'nullable|string|max:100',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);

        $universitario = Universitario::findOrFail($id);
        $universitario->primer_nombre = $request->input('primer_nombre');
        $universitario->segundo_nombre = $request->input('segundo_nombre');
        $universitario->primer_apellido = $request->input('primer_apellido');
        $universitario->segundo_apellido = $request->input('segundo_apellido');
        $universitario->DPI = $request->input('DPI');
        $universitario->edad = $request->input('edad');
        $universitario->telefono = $request->input('telefono');
        $universitario->universidad = $request->input('universidad');
        $universitario->no_carnet = $request->input('no_carnet');
        $universitario->practica = $request->input('practica');
        $universitario->fecha_incio = $request->input('fecha_incio');
        $universitario->fecha_final = $request->input('fecha_final');
        $universitario->consentimiento = $request->input('consentimiento');
        $universitario->no_consentimiento = $request->input('no_consentimiento');
        $universitario->estado_actual = $request->input('estado_actual');
        $universitario->save();
        return redirect('/general/universitario_detalle/'.$universitario->id)->with('mensaje','editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Universitario  $universitario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $universitario=Universitario::findOrFail($id);
        Universitario::destroy($id);
        return redirect('universitario')->with('mensaje', 'eliminado');
    }
}
