<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuntoInteresController;
use App\Http\Controllers\RutaController;
use App\Models\PuntoInteres;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('rutas', [RutaController::class, 'index']);
Route::get('rutas/{ruta}/puntosInteres', [RutaController::class, 'puntosRuta']);
Route::get('puntosInteres', [PuntoInteresController::class, 'index']);


Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('rutas/misRutas', [RutaController::class, 'misRutas']);
    Route::get('rutas/{ruta}', [RutaController::class, 'show']);
    Route::post('rutas/{id_ruta}/puntos-interes/{id_punto_interes}', [RutaController::class, 'agregarPuntoInteres']);
    Route::delete('rutas/{id_ruta}/puntos-interes/{id_punto_interes}', [RutaController::class, 'quitarPuntoInteres']);
    Route::post('rutas', [RutaController::class, 'store']);
    Route::put('rutas/{ruta}', [RutaController::class, 'update']);
    Route::patch('rutas/{ruta}', [RutaController::class, 'update']);
    Route::delete('rutas/{ruta}', [RutaController::class, 'destroy']);
    Route::post('rutas/{ruta}/imagenes', [RutaController::class, 'storeImage']);
    Route::get('perfil/puntos-interes', [ProfileController::class, 'puntosInteresVisitados']);
});
