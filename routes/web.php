<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\views\ControllerVista;
use Illuminate\Support\Facades\Route;



Route::get("/",[ControllerVista::class,'__invoke']);//aqui se rutea el controlador , donde esta alojada la funcion 
Route::get("/dashboard",[ControllerVista::class,'dash']);