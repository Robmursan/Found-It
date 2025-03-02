<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materiales extends Model
{
   //
    //nombre de tabla
    protected $table='material'; //nombre de tabla
    protected $primarykey='id_material'; // clave primaria
    //entidades de la tabla
    protected $fillable=[
        'nombre',
        'categoria',
        'codigo',
        'fecha_salida'
    ];

    //funcion para relacion
    public function inventario(){
        return $this->hasOne(Inventario::class,'material_id');
    }

    protected $attributes=[
        'categoria'=>'Sin categoria',
    ]; 



}
