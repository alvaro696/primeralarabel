<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\PolizaController;
use App\Http\Controllers\RamoController;
use App\Http\Controllers\RamoTipoController;

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

Route::get('distrito/listar', [DistritoController::class, 'listar']);
Route::get('ramo/listar', [RamoController::class, 'listar']);
Route::get('ramo_tipo/listar/{id_ramo}', [RamoTipoController::class, 'listar']);
Route::post('cotizacion/cotizar', [CotizacionController::class, 'cotizar']);
Route::post('cotizacion/crear', [CotizacionController::class, 'crear']);

Route::post('cliente/crear', [ClienteController::class, 'crear']);

Route::post('register', [PassportController::class, 'register']);
Route::post('login', [PassportController::class, 'login'])->name('login');

Route::middleware('auth:api')->group(function () {

    Route::get('logout', [PassportController::class, 'logout']);

    Route::get('cliente/seleccionar', [ClienteController::class, 'seleccionar']);
    Route::put('cliente/actualizar/{id_cliente}', [ClienteController::class, 'actualizar']);
    Route::delete('cliente/eliminar/{id_cliente}', [ClienteController::class, 'eliminar']);

    Route::get('mis_cotizaciones/listar/{id_cliente}', [CotizacionController::class, 'listar']);
    Route::get('mis_cotizaciones/seleccionar/{id_cotizacion}', [CotizacionController::class, 'seleccionar']);
    
    Route::get('mis_polizas/seleccionar/{id_poliza}', [PolizaController::class, 'seleccionar']);
    Route::get('mis_polizas/listar/{id_cliente}', [PolizaController::class, 'listar']);
    Route::post('mis_polizas/crear/{id_cotizacion}', [PolizaController::class, 'crear']);
});
