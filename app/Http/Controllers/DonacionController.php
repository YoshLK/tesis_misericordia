<?php

namespace App\Http\Controllers;

use App\Models\Donacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\DonacionUpdated;
use App\Events\DonacionHistory;
use Illuminate\Support\Facades\Auth;

class DonacionController extends Controller
{   
    function __construct(){
        $this->middleware('permission:ver-donacion',['only'=>['index']]);
        $this->middleware('permission:crear-donacion',['only'=>['create', 'store']]);
        $this->middleware('permission:editar-donacion',['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-donacion',['only'=>['destroy']]);
    }
    public function index()
    {
         $donaciones = DB::table('donacions')
        ->join('donadors', 'donacions.donador_id', '=', 'donadors.id')
        ->select('donacions.*', 'donadors.nombre_donador')
        ->get(); 

        $donaciones = Donacion::with(['createdBy', 'updatedBy'])->get();
        return view('donacion.index', [
            'donaciones' => $donaciones,
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
        $donacion = new Donacion();
        $donacion->tipo_donacion = $request->input('tipo_donacion');
        $donacion->descripcion = $request->has('descripcion') ? $request->input('descripcion') : null;
        $donacion->donador_id = $request->input('donador_id');
        $donacion->created_by = auth()->user()->id;
        $donacion->save();
        
        return redirect('donador')->with('mensaje', 'registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donacion $donacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donacion $donacion)
    {
        /* $datosDonacion=Donacion::findOrFail($id); */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'tipo_donacion'=>'required|string|max:100',
            'descripcion'=>'required|string|max:200',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido.'
        ];
        $this->validate($request, $campos, $mensaje);
        
        $donacion=Donacion::findOrFail($id);
        event(new DonacionUpdated($donacion, Auth::user()));
        $donacion->tipo_donacion = $request->input('tipo_donacion');
        $donacion->descripcion = $request->input('descripcion');
        $donacion->updated_by = auth()->user()->id;
        
        $donacion->save();
       
        return redirect()->route('donacion.index')->with('mensaje', 'editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { 
        $donacion = Donacion::findOrFail($id);
        if ($donacion) {
            $donacion->delete();   
            event(new DonacionUpdated($donacion, Auth::user()));
        }
        $donacion->forceDelete();
        return redirect()->route('donacion.index')->with('mensaje', 'eliminado');
    }
}
