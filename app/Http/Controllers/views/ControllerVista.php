<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerVista extends Controller
{    //
    public function __invoke(){
        return view('layouts.login'); //vista de inicio de session
    }

        // Vista del dashboard
    public function dashboard(){
        return view('dashboard');
    }

    public function embarques (){
        return view('embarques');
    }

    public function conteos (){
        return view('conteos');
    }
    public function surtido (){
        return view('surtido');
    }

}
