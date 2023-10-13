<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $conteoActivo = DB::table('adultos')->where('estado_actual', 'Activo')->count();
        $conteoInactivos = DB::table('adultos')->where('estado_actual', 'Inactivo')->count();

        //$hoy = now();
        $cumplesAdultos = DB::table('adultos')
        ->where('estado_actual', 'activo')
        ->whereRaw('DATE_ADD(fecha_nacimiento, INTERVAL YEAR(CURDATE()) - YEAR(fecha_nacimiento) YEAR) >= CURDATE()')
        ->whereRaw('DATE_ADD(fecha_nacimiento, INTERVAL YEAR(CURDATE()) - YEAR(fecha_nacimiento) YEAR) <= DATE_ADD(CURDATE(), INTERVAL 30 DAY)')
        ->orderByRaw('DATE_ADD(fecha_nacimiento, INTERVAL YEAR(CURDATE()) - YEAR(fecha_nacimiento) YEAR)')
        ->get();

        $cumplesPersonals = DB::table('Personals')
        ->where('estado_actual', 'activo')
        ->whereRaw('DATE_ADD(fecha_nacimiento, INTERVAL YEAR(CURDATE()) - YEAR(fecha_nacimiento) YEAR) >= CURDATE()')
        ->whereRaw('DATE_ADD(fecha_nacimiento, INTERVAL YEAR(CURDATE()) - YEAR(fecha_nacimiento) YEAR) <= DATE_ADD(CURDATE(), INTERVAL 30 DAY)')
        ->orderByRaw('DATE_ADD(fecha_nacimiento, INTERVAL YEAR(CURDATE()) - YEAR(fecha_nacimiento) YEAR)')
        ->get();

        return view('home', [
            'conteoActivo' => $conteoActivo,
            'conteoInactivos' => $conteoInactivos,
            'cumplesAdultos'=> $cumplesAdultos,
            'cumplesPersonals'=> $cumplesPersonals,
           /*  'enfermedades'=>$enfermedades,
            'medicinas'=>$medicinas,
            'sumaMedicina'=>$sumaMedicina,
            'empleadosConHorarios'=>$empleadosConHorarios, */
        ]);
    }

}
