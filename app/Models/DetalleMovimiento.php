<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleMovimiento extends Model
{
    use HasFactory;
    protected $table = "detalles_movimiento";
    protected $fillable = ['insumo_id', 'ubicacion_id', 'fecha_instalacion', 'puesto_trabajo_id'];

    public function insumo()
{
    return $this->belongsTo(Insumo::class);
}

public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
}
