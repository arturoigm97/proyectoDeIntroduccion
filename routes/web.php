<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotasController;
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

//ESTAS SON LAS RUTAS PARA MANDAR A LLAMAR DIFERENTES VISTAS

Route::get("/dos",[MascotasController::class,'indexmascotas']);
Route::get("/sumaChavos",[MascotasController::class,'motorola']);
Route::get("/arregloCosas",[MascotasController::class,'json']);
Route::get("/ejemploVista",[MascotasController::class,'retornaVista']);
Route::get("/formulario",[MascotasController::class,'ViewFormulario']);
Route::post("/ingresarDatosForm",[MascotasController::class,'insertarMascotas']);
//Route::get("/mostrarDatos",[MascotasController::class,'recibirDatos']);








