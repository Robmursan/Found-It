<?php

use App\Http\Controllers\Api\MatController;
use App\Http\Controllers\Api\AuthCotroller;
use App\Http\Controllers\api\InventarioController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */


// APIRest

//usuarios
/* Route::get('usuarios',[AuthCotroller::class,'index']);
Route::post('/createUsuario',[AuthCotroller::class,'store']); */

//inventario
/* Route::get('/inventario',[InventarioController::class,'inventario']);
Route::post('/registroInventario',[InventarioController::class,'registrarInventario']); */

/* //materiales
Route::get('/material',[MatController::class,'listaMaterial'])->name('listaMaterial');//ruta para ver material
Route::post('/materialCreate',[MatController::class,'registrarMaterial'])->name('registroMaterial'); //regitro de material
Route::post('/editarMaterial/{id}',[MatController::class,'obtenerUnMaterial'])->name('editarMaterial'); //obtener un material */
//Route::post('/agregarUbicacion/{id}',[InventarioController::class,'registrarUbicacion'])->name('registroUbicacion'); //regsitro de ubicacion
//Route::middleware('auth:sanctum')->post('/agregarUbicacion/{id}',[InventarioController::class,'registrarUbicacion'])->name('registroUbicacion');

