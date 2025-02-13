<?php

use App\Http\Controllers\controladorSesion;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('layouts.login');
}); */

Route::get("/",controladorSesion::class);//aqui se rutea el controlador , donde esta alojada la funcion 
