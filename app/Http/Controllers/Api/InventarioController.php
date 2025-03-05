<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//importacion de modelos
use App\Models\Usuarios;
use App\Models\Estante;
use App\Models\Inventario;
use App\Models\Materiales;
use Illuminate\Support\Facades\Auth;


class InventarioController extends Controller
{
    //


    public function inventarioCompleto(){
        /* $inventario=Inventario::all();
        return response()->json($inventario,200); */
        $inventario=Inventario::with(['material','estante.usuario'])->get();

        return response()->json([
            'message'=>'detalles de inventario',
            'inventario'=>$inventario,

        ],200);
    }

    public function registrarInventario( Request $request){

        $registro = $request->validate([
            'usuario_id'=>'required|exists:usuario,id_usuario',
            'material_id'=>'required|exists:material,id_material',
            'cantidad'=>'required|integer|min:1',
            'pasillo'=> 'required|string',
            'columna'=>'required|string',
            'fila'=>'required|string',
        ]);
        
        //validar si los datos son ingresados
        /* if($registro->fails()){
            $data=[
                'mensaje'=>'Error al validar datos',
                'Error'=>$registro->errors(),
                'status'=>'400'
            ];
            return response()->json($data,400);
        } */

        // guardar en la base de datos

        //crear registros en la tabla de inventario
        $inventario= Inventario::create([
            'cantidad'=>$request->cantidad,
            'material_id'=>$request->material_id,
            'fecha_actualizacion'=>now(), //asignacion de fecha actual
        
        ]);

        //  Verificar si el inventario se creó correctamente
        if (!$inventario || !$inventario->id_inventario) {
            return response()->json([
                'error' => 'No se pudo crear el inventario',
                'inventario' => $inventario
            ], 500);
        }
        
        //recargar relacion 
        $inventario->load('material');

        //crear registros en estante
        $estante = Estante::create([
            'pasillo'=>$request->pasillo,
            'columna'=>$request->columna,
            'fila'=>$request->fila,
            'led'=>false,
            'usuario_id'=>$request->usuario_id,
            'material_id'=>$request->material_id,
            'inventario_id'=>$inventario->id_inventario,

        ]);
        
        return response()->json([
            'message'=>'Registro en invenatario exitoso',
            'inventario'=>$inventario,
            'material'=>$inventario->material,
            'estante'=>$estante
        ],201);


        
    }

    public function registrarUbicacion(Request $request, $id){

        $material=Materiales::where('id_material',$id)->first();
        
        // Verificar si el material existe
        if (!$material) {
            return response()->json(['message' => 'Material no encontrado'], 404);
        }

        $request->validate([
            //'pasillo' => 'required',
            'columna' => 'required',
            'fila' => 'required',
            'led' => 'boolean',

        ]);

        $usuario_id = auth()->id();

        //crear un nuevo registro en estante + material
        $estante=new Estante();
        $estante->usuario_id = $usuario_id;
        $estante->columna = $request->columna;
        $estante->fila = $request->fila;
        $estante->led = $request->led ?? false;
        $estante->save(); //guardar estante en BD

        //relacion material con estante FK material
        $material->id_estante = $estante->id_estante; 
        $material->save();

        return view('conteos',['mensaje'=>'Registro existoso']);
        
    }

}
