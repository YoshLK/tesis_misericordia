<?php

namespace App\Http\Controllers;

use App\Models\Donador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Donacion;

class DonadorController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-donacion',['only'=>['index']]);
        $this->middleware('permission:crear-donacion',['only'=>['create', 'store']]);
        $this->middleware('permission:editar-donacion',['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-donacion',['only'=>['destroy']]);
    }
    public function index()
    {   
        //$donadores = DB::table('donadors')->get(); 

         $donadores = DB::table('donadors')
        ->leftJoin('donacions', 'donadors.id', '=', 'donacions.donador_id')
        ->select('donadors.id', 'donadors.nombre_donador', 'donadors.organizacion','donadors.telefono_donador', DB::raw('COUNT(donacions.id) as total_donaciones'))
        ->groupBy('donadors.id', 'donadors.nombre_donador','donadors.organizacion','donadors.telefono_donador')
        ->get();
        return view('donador.index', [
            'donadores' => $donadores,
        ]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre_donador'=>'required|string|max:200',
            'tipo_donacion'=>'required|string|max:100',
            'descripcion'=>'required|string|max:200',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);
       
        $donador = new Donador;
        $donador->nombre_donador = $request->input('nombre_donador');
        $donador->organizacion = $request->input('organizacion');
        $donador->telefono_donador = $request->input('telefono_donador');
        $donador->save();
        
        $donacion = new Donacion;
        $donacion->tipo_donacion = $request->input('tipo_donacion');
        $donacion->descripcion = $request->input('descripcion');
        $donacion->donador_id = $donador->id;
        $donacion->save();

        return redirect('donador')->with('mensaje','registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donador $donador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donador $donador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre_donador'=>'required|string|max:200',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);

        $datosDonador = request()->except('_token','_method');
        Donador::where('id','=',$id)->update($datosDonador);
        $donador=Donador::findOrFail($id);    
        return redirect()->route('donador.index')->with('mensaje', 'editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $donador=Donador::findOrFail($id);
        Donador::destroy($id);
        return redirect()->route('donador.index')->with('mensaje', 'eliminado');
    }
}
