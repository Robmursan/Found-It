<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estante extends Model
{
    //
    use HasFactory;
    protected $table='estante'; //nombre de tabla
    protected $primarykey='id_estante'; //clave primaria
    protected $fillable=[
        'pasillo',
        'columna',
        'fila',
        'led',
        'usuario_id',
        'material_id',
        'inventario_id'
    ];

    //funciones para relaciones al FK
    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function material(){
        return $this->belongsTo(Materiales::class,'material_id', 'id_material');
    }
    public function inventario(){
        return $this->belongsTo(Inventario::class, 'inventario_id', 'id_inventario');
    }

}
