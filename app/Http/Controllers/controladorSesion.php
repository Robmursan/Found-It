<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class controladorSesion extends Controller
{
    public function __invoke(){
        return view('layouts.login');//mediante la funcion invoke se llama a la vista , que en este caso es login ubicado en la carpeta layouyts
    }
}
