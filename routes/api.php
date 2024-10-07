<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ZonaRiegoController;
use App\Http\Controllers\DispositivoIoTController;
use App\Http\Controllers\DatoSensorController;
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
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('zonas_riego', ZonaRiegoController::class);
Route::apiResource('dispositivos_iot', DispositivoIoTController::class);
Route::apiResource('datos_sensores', DatoSensorController::class);
Route::post('login', [UsuarioController::class, 'login']);
Route::get('usuarios/{id}/zonas', [UsuarioController::class, 'zonas']);
Route::get('zonas_riego/{id}/dispositivos', [ZonaRiegoController::class, 'dispositivos']);
Route::get('dispositivos_iot/{id}/datos', [DispositivoIoTController::class, 'datos']);