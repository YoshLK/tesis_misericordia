<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonacionHistory;

class DonacionHistoryController extends Controller
{   
    function __construct(){
        $this->middleware('permission:auditoria-donacion',['only'=>['mostrarHistorial']]);
    }
    public function mostrarHistorial()
    {
        // Recupera los registros del historial utilizando el modelo DonacionHistory
        $historial = DonacionHistory::all();

        // Pasa los registros a la vista 'historial.blade.php'
        return view('donacion.update', ['historial' => $historial]);
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('id');
       
        $donacion=DonacionHistory::findOrFail($id);
        DonacionHistory::destroy($id);
        return redirect('/donaciones/historial')->with('mensaje','eliminado');
    }
}
