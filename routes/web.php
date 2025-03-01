<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\views\ControllerVista;
use Illuminate\Support\Facades\Route;



Route::get("/",[ControllerVista::class,'__invoke']);//aqui se rutea el controlador , donde esta alojada la funcion 

//ruta para el dashboard
Route::get("/dashboard", [ControllerVista::class, 'dashboard'])->name('dashboard');


Route::get("/embarques", [ControllerVista::class, 'embarques'])->name('embarques');

Route::get("/conteos", [ControllerVista::class, 'conteos'])->name('conteos');



