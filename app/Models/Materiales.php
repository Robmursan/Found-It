<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materiales extends Model
{
   //
    //nombre de tabla
    protected $table='material';
    //entidades de la tabla
    protected $fillable=[
        'nombre',
        'categoria',
        'codigo',
        'fecha_salida'
    ];
    protected $attributes=[
        'categoria'=>'Sin categoria',
    ]; 



}
