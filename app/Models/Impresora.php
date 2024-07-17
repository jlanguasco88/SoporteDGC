<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impresora extends Model
{
    use HasFactory;
    protected $fillable = ['orden', 'serie', 'nombre', 'toner_id', 'ubicacion_id', 'estado', 'descripcion'];

    public function toner()
    {
        return $this->belongsTo(Toner::class);
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
    
    public function detallesCambioToner()
{
    return $this->hasMany(DetallesCambioToner::class);
}

    public function historialCambioToner()
    {
         return $this->hasMany(DetallesCambioToner::class, 'impresora_id');
    }

    

    public function impresionesDesdeUltimoCambio()
    {
        $contadorUltimoCambio = $this->historialCambioToner()
            ->orderBy('id', 'desc')
            ->value('contador_impresora');

        if ($contadorUltimoCambio !== null) {
            return $this->contador_impresora - $contadorUltimoCambio;
        }

        return null;
    }

    public function guardarCambioToner(Request $request, Impresora $impresora)
{
    $historial = new HistorialCambioToner();
    // Asignar otros atributos
    $historial->fecha_cambio = now();
    // ...

    // Asignar el contador actual, ya que el evento se encargará de restar el anterior
    $historial->contador_impresora = $request->input('contador_impresora');

    $impresora->historialCambioToner()->save($historial);

    // Redirigir o realizar otras acciones después de guardar
}

}
