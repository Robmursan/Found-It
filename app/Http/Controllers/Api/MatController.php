<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Materiales;
use Illuminate\Http\Request;


class MatController extends Controller
{
    //
    public function listaMaterial(){
        $materiales= Materiales::all();

        //return response()->json($materiales,200);
        return view('conteos',['materiales'=> $materiales]);
    }

    public function registrarMaterial(Request $request){
        
        //codigo unico x material
        $codigoExistente=Materiales::where('codigo',$request->codigo)->first();

        if($codigoExistente){
            return view('embarquesagregar',['mensaje'=>'El codigo ya existe']);
        }

        $validar = Validator::make($request->all(),[
            'nombre'=>'required',
            'categoria'=>'required|string|in:ferreteria,electronica,herramientas',
            'codigo'=>'required',
            'cantidad'=>'required'

        ]);

        if($validar->fails()){
            $data=[
                'mensaje'=>'Erro al validar',
                'error'=> $validar->errors(),
                'status'=> 400
            ];
            return response()->json($data,400);

        }

        //preprara para mandar DB
        $material= Materiales::create([
            'nombre'=>$request->nombre,
            'categoria'=>$request->categoria ?? 'Sin Categoria', //valor por defecto
            'codigo'=>$request->codigo,
            'cantidad'=>$request->cantidad
        ]);

        if(!$material){
            $data=[
                'mensaje'=>'Error al agregar material',
                'status'=> 500
            ];
            return response()->json($data,500);

        }

        /* $data=[
            'material'=>$material,
            'status'=> 201
        ];
        return response()->json($data,201); */
        return redirect()->route('embarquesagregar')->with('mensaje','Registro exitoso');
    }

    public function obtenerUnMaterial(Request $request,$id){

        $material=Materiales::where('id_material',$id)->first();

        if(!$material){
            return response()->json(['message' => 'Material no encontrado'], 404);
        }

        return view('conteoagregar',['material'=>$material]);

    }
}
