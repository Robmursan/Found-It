<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert; 

class AuthCotroller extends Controller
{
    //funcion para obtener usuarios 
    public function index(){
        //$usuarios= Usuario::all();
        $usuarios=Usuarios::all();
        return response()->json($usuarios,200);

    }


    //autentificacion
    public function authenticate(Request $request){

        $credenciales =$request->validate([
            'email'=> ['required','email'],
            'password'=> ['required'],
        ]);

        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        
        
        }
        
        return back()->withErrors([
            'Error'=>'Error, Credenciales Incorrectas',
        ]);
        
        
    }

    //crear usuario
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm-password' => 'required|same:password'
        ]);

        $data = $request->except('confirm-password');
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect('/login')->with('success', 'Usuario registrado correctamente.');
    }


    //cierre de sesion
    public function logout(Request $request){
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
