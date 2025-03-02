<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Usuarios;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  Illuminate\Support\Facades\Validator;
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
        //funcion para registrar
    public function Registrarusuario(Request $request){
        
        $validar = Validator::make($request->all(),[
            'correo'=>'required|email|unique:usuario,correo',
            'pass'=>'required|min:6',
            'username'=>'required|unique:usuario,username',
            'rol'=>'required',
            'estado'=> 'nullable'
        ]);
        
        //valida si contiene datos ingresados
        if($validar->fails()){
            $data=[

                'mensaje'=>'Erro al validar usuario',
                'Erro'=>$validar->errors(),
                'status'=>'400'
            ];
            return response()->json($data,400); //reponde al usuario 
        }

        //mandamos los datos ala Base de Datos encryptando pass
        $usuario = Usuarios::create([
            'correo'=>$request->correo,
            'pass'=>Hash::make($request->pass), //pass encryptado
            'username'=>$request->username,
            'rol'=>$request->rol,
            'estatus'=>$request->estatus ?? true //estatus defaul 1=activo
        ]);

        //si no se creo el usuario
        if(!$usuario){
            $dato=[
                'Mensaje'=>'Error al crear Usuario',
                'status'=>'500'
            ];
            //reponder mensaje
            return response()->json($dato,500);
        }

        //si creo usuario
        $usuario=[
            'Usuario'=>$usuario,
            'status'=>201
        ];
        return response()->json($usuario,201);

    }
    
    //login de usuario
    public function loginUser(Request $request){
        $loginData =Validator::make($request->all(),[
            'correo'=>'required|email',
            'pass'=>'required'
        ]);

        if($loginData->fails()){ //validad datos requeridos
            $dato=[
                'mensaje'=> 'Erro al iniciar',
                'Erro'=>$loginData->errors(),
                'status'=>400
            ];
            return response()->json($dato,400);
        }

        //consulta usuario y contraseña ingresados
        $usuario=Usuarios::where('correo',$request->correo)->first();//busca el usuario
        

        if($usuario && Hash::check($request->pass,$usuario->pass)){

           //return view('dashboard');
            return redirect()->route('dashboard');

        }else{

            return view('layouts.login')->with('mensaje','Credenciales Incorrectas');
            //return back()->with('mensaje','Credenciales Incorrectas');
        }
        
        

    }

    // Cerrar sesion

    public function logout(Request $request){
        //cerrar sesion
        Auth::logout(); //usado desde la libreria 
        //invalidar session
        $request->session()->invalidate();
        
        $request->session()->regenerate(); //regenera id

        //redireccionar a login
        return redirect()->route('inicioSesion');

    }

}
