<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'tipo_insumo', 'fecha_compra', 'estado', 'stock','ubicacion_id'];

    public function ubicacion(){
    return $this->belongsTo(Ubicacion::class,'ubicacion_id');
    }
}

