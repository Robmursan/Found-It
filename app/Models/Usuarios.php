<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Laravel\Sanctum\HasApiTokens;
class Usuarios extends Model
{
    use HasFactory;
    //use HasFactory,HasApiTokens;
    
    //nombre de tabla
    protected $table='Usuario';

    protected $fillable=[
        'correo',
        'pass',
        'username',
        'rol',
        'estado'
    ];

    protected $attributes=[
        'estado'=>'1',
    ]; 

    //oculta la propiedad al convertir en arry o json
    protected $hidden=[
        'pass'
    ]; 
}
