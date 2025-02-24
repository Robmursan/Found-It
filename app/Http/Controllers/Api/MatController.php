<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Materiales;
use Illuminate\Http\Request;

class MatController extends Controller
{
    //
    public function index(){
        $materiales= Materiales::all();

        return response()->json($materiales,200);
    }

    public function registrarMaterial(Request $request){
        $validar = Validator::make($request->all(),[
            'nombre'=>'required',
            'categoria',
            'codigo'=>'required'

        ]);

        if($validar->fails()){
            $data=[
                'mensaje'=>'Erro al validar',
                'error'=> $validar->errors(),
                'status'=> 400
            ];
            return response()->json($data,400);

        }

        $material= Materiales::create([
            'nombre'=>$request->nombre,
            'categoria'=>$request->categoria ?? 'Sin Categoria', //valor por defecto
            'codigo'=>$request->codigo
        ]);

        if(!$material){
            $data=[
                'mensaje'=>'Error al agregar material',
                'status'=> 500
            ];
            return response()->json($data,500);

        }

        $data=[
            'material'=>$material,
            'status'=> 201
        ];
        return response()->json($data,201);

    }
}
