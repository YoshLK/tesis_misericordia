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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//RUTA GENERAL DE ADULTOS
//Route::get('adulto/inactivo', [AdultoController::class, 'inactivo'])->name('adulto.inactivo');
//Route::resource('adulto', AdultoController::class);
//referencias
Route::resource('referencia', ReferenciaController::class);
//historial
Route::resource('historial', HistorialController::class);
//patologia
Route::resource('patologia', PatologiaController::class);
Route::post('/eliminar_patologia', [PatologiaController::class, 'eliminar'])->name('eliminar_patologia');
//medicamento
Route::resource('medicamento', MedicamentoController::class);
Route::post('/eliminar_medicamento', [MedicamentoController::class, 'eliminar'])->name('eliminar_medicamento');

//Ruta visualizar detalles
Route::get('/general/adulto_detalle/{id}',[App\Http\Controllers\GeneralController::class, 'verAdulto']);
Route::get('/general/personal_detalle/{id}',[App\Http\Controllers\GeneralController::class, 'verPersonal']);

//Dashboard rutas
Route::get('/grafica-medicinas', [DashboardController::class,'graficaMedicinas'])->name('grafica-medicinas');
Route::get('/conteo-activos', [DashboardController::class,'conteoActivos'])->name('conteo-activos');
Route::get('dashboard', [DashboardController::class, 'adultosDashboard'])->name('dashboard');


//RUTAS PERSONAL GENERAL PERSONAL
Route::resource('personal', PersonalController::class);
//horarios
Route::resource('horario', HorarioController::class);


//RUTAS DONADOR GENERAL DONADOR
Route::resource('donador', DonadorController::class);
//donacion
Route::resource('donacion', DonacionController::class);

//rutas limitadas 

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::get('adulto/inactivo', [AdultoController::class, 'inactivo'])->name('adulto.inactivo');
    Route::resource('adulto', AdultoController::class);
});