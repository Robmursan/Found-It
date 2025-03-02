<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    //
    use HasFactory;
    protected $table='inventario'; //nombre de tabla
    protected $primaryKey='id_inventario'; //clave primaria
    public $incrementing=true;

    protected $fillable=[
        'cantidad',
        'fecha_actualizacion',
        'material_id'
    ];

    //funcion para la union
    public function Material(){
        return $this->belongsTo(Materiales::class,'material_id','id_material');
    }

    public function Estante(){
        return $this->hasOne(Estante::class,'inventario_id','id_inventario');
    }
}
