<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\views\ControllerVista;
use Illuminate\Support\Facades\Route;



Route::get("/",[ControllerVista::class,'__invoke']);//aqui se rutea el controlador , donde esta alojada la funcion 

//ruta para el dashboard
Route::get("/dashboard", [ControllerVista::class, 'dashboard'])->name('dashboard');


Route::get("/embarques", [ControllerVista::class, 'embarques'])->name('embarques');



Route::get("/conteos", [ControllerVista::class, 'conteos'])->name('conteos');

Route::get("/surtido", [ControllerVista::class, 'surtido'])->name('surtido');

Route::get("/agregarembarques", [ControllerVista::class, 'agregarembarques'])->name('agregarembarques');

Route::get("/conteoagregar", [ControllerVista::class, 'conteoagregar'])->name('conteoagregar');

Route::get("/surtsalida", [ControllerVista::class, 'surtsalida'])->name('surtsalida');


Route::get("/dashboardusuarios", [ControllerVista::class, 'dashboardusuarios'])->name('dashboardusuarios');
