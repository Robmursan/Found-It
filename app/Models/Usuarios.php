<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
//use Laravel\Sanctum\HasApiTokens;
class Usuarios extends Model
{
    use HasFactory;
    use HasApiTokens;
    
    
    //nombre de tabla
    protected $table='Usuario'; //nombre de tabla
    protected $primarykey='id_usuario'; //clave primaria

    protected $fillable=[
        'correo',
        'pass',
        'username',
        'rol',
        'estado'
    ];

    //funcion para relacion
    public function estante(){
        return $this->hasMany(Estante::class,'usuario_id'); //
    }

    protected $attributes=[
        'estado'=>'1',
    ]; 

    //oculta la propiedad al convertir en arry o json
    protected $hidden=[
        'pass'
    ]; 
}
