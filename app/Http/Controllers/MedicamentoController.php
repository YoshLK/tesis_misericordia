<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicamento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre_medicamento'=>'required|string|max:50',
            'cantidad_medicamento'=>'required|numeric',
            'medida_medicamento'=>'required|string|max:30',
            'via_administracion'=>'required|string|max:50',
            'frecuencia_tiempo'=>'required|integer',
            'frecuencia_dia'=>'required|string|max:30',
            'fecha_inicio'=>'date|required',
            'fecha_fin'=>'date|nullable',
            'duracion_dias'=>'nullable|integer',
            'nota_medicamento'=>'nullable|string',
            'adulto_id'=>'required|integer',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosMedicamento = request()->except('_token');
        Medicamento::insert($datosMedicamento);
        return redirect('/general/adulto_detalle/'.$request->adulto_id)->with('mensaje', 'registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamento $medicamento)
    {
        $medicamento=Medicamento::findOrFail($id);
        return view( '/general/adulto_detalle/'.$request->adulto_id , compact('medicamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre_medicamento'=>'required|string|max:50',
            'cantidad_medicamento'=>'required|numeric',
            'medida_medicamento'=>'required|string|max:30',
            'via_administracion'=>'required|string|max:50',
            'frecuencia_tiempo'=>'required|integer',
            'frecuencia_dia'=>'required|string|max:30',
            'fecha_inicio'=>'date|required',
            'fecha_fin'=>'date|nullable',
            'duracion_dias'=>'nullable|integer',
            'nota_medicamento'=>'nullable|string',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosMedicamento = request()->except(['_token','_method']);
        Medicamento::where('id','=',$id)->update($datosMedicamento);
        $medicamento=Medicamento::findOrFail($id);    
        return redirect( '/general/adulto_detalle/'.$request->adulto_id)->with('mensaje','editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamento $medicamento)
    {
        //
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('id');
        $ruta = $request->input('ruta');
        $medicamento=Medicamento::findOrFail($id);
        Medicamento::destroy($id);
        return redirect('/general/adulto_detalle/'.$ruta)->with('mensaje','eliminado');
    }
}