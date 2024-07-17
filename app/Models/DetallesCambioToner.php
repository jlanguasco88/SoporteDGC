<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesCambioToner extends Model
{
    use HasFactory;
    protected $fillable = ['impresora_id', 'toner_id', 'fecha_cambio', 'contador_impresora', 'motivo'];

    public function impresora()
    {
        return $this->belongsTo(Impresora::class);
    }

    public function toner()
    {
        return $this->belongsTo(Toner::class);
    }
    
    public function diasDesdeUltimoCambio()
{
    $fechaUltimoCambio = $this->where('impresora_id', $this->impresora_id)
        ->where('id', '<', $this->id)
        ->orderBy('id', 'desc')
        ->value('fecha_cambio');

    if ($fechaUltimoCambio) {
        return now()->diffInDays($fechaUltimoCambio);
    }

    return null;
}
    

}
