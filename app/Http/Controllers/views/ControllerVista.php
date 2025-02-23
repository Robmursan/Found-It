<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerVista extends Controller
{    //
    public function __invoke(){
        return view('layouts.login'); //vista de inicio de session
    }
}
