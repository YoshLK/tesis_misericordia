<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdultoController;
use App\Http\Controllers\ReferenciaController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\PatologiaController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\DonadorController;
use App\Http\Controllers\DonacionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UniversitarioController;
use App\Http\Controllers\DonacionHistoryController;

//roles
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//RUTA GENERAL DE ADULTOS
//Route::get('adulto/inactivo', [AdultoController::class, 'inactivo'])->name('adulto.inactivo');
//Route::resource('adulto', AdultoController::class);
//referencias

//historial






//Dashboard rutas
/* Route::get('/grafica-medicinas', [DashboardController::class,'graficaMedicinas'])->name('grafica-medicinas');
Route::get('/conteo-activos', [DashboardController::class,'conteoActivos'])->name('conteo-activos'); */
//Route::get('home', [HomeController::class, 'adultosDashboard'])->name('dashboard');


//rutas limitadas 
Route::group(['middleware' => ['auth']], function() {
    //roles y persmisos
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);

    //adulto
    Route::get('adulto/inactivo', [AdultoController::class, 'inactivo'])->name('adulto.inactivo');
    Route::resource('adulto', AdultoController::class);
    //Ruta visualizar detalles
    Route::get('/general/adulto_detalle/{id}',[App\Http\Controllers\GeneralController::class, 'verAdulto']);
    Route::get('/general/personal_detalle/{id}',[App\Http\Controllers\GeneralController::class, 'verPersonal']);
    Route::get('/general/universitario_detalle/{id}',[App\Http\Controllers\GeneralController::class, 'verUniversitario']);
    //patologia
    Route::resource('patologia', PatologiaController::class);
    Route::post('/eliminar_patologia', [PatologiaController::class, 'eliminar'])->name('eliminar_patologia');

    //referencia
    Route::resource('referencia', ReferenciaController::class);
    Route::resource('historial', HistorialController::class);

    //medicamento
    Route::resource('medicamento', MedicamentoController::class);
    Route::post('/eliminar_medicamento', [MedicamentoController::class, 'eliminar'])->name('eliminar_medicamento');

    //RUTAS PERSONAL GENERAL PERSONAL
    Route::get('personal/inactivo', [PersonalController::class, 'inactivo'])->name('personal.inactivo');
    Route::resource('personal', PersonalController::class);
    //horarios
    Route::resource('horario', HorarioController::class);

    //RUTAS DONADOR GENERAL DONADOR
    Route::resource('donador', DonadorController::class);
    //donacion
    Route::resource('donacion', DonacionController::class);
    //donacion update
    Route::get('/donaciones/historial',[App\Http\Controllers\DonacionHistoryController::class, 'mostrarHistorial']);
    Route::post('/eliminar_historial', [DonacionHistoryController::class, 'eliminar'])->name('eliminar_historial');

    //RUTAS DONADOR GENERAL DONADOR
    Route::resource('universitario', UniversitarioController::class);
   
});