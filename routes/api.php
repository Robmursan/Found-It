<?php

use App\Http\Controllers\Api\MatController;
use App\Http\Controllers\Api\AuthCotroller;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */


// APIRest

//usuarios
Route::get('usuarios',[AuthCotroller::class,'index']);
Route::post('/createUsuario',[AuthCotroller::class,'Registrarusuario']);
Route::post('/login',[AuthCotroller::class,'loginUser']);

//materiales
Route::get('/material',[MatController::class,'index']);//ruta para ver estudiante
Route::post('/materialCreate',[MatController::class,'registrarMaterial']);


Route::get('/usuario/{id}',function(){
    return 'obteniendo un usuario';
});

Route::put('/usuario{id}',function(){
    return 'ACtualizando';
});

Route::delete('usuario/{id}', function ($id) {
    return 'eliminando usuario';
});