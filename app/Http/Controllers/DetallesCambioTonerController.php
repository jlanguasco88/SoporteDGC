<?php

namespace App\Http\Controllers;
use App\Models\Impresora;
use Illuminate\Http\Request;

class DetallesCambioTonerController extends Controller
{
    public function mostrarHistorial(Impresora $impresora)
{
    // Cargar el historial de cambios de tóner para la impresora
    $impresora->load('historialCambioToner');
    //dd($impresora->historialCambioToner->toArray());

    return view('paginas.impresoras.historial_cambios_toner', compact('impresora'));
}

protected static function boot()
{
    parent::boot();

    static::creating(function ($historial) {
        // Obtener el registro anterior al actual
        $registroAnterior = self::where('impresora_id', $historial->impresora_id)
            ->orderBy('id', 'desc')
            ->first();

        // Restar el contador del registro anterior al actual
        if ($registroAnterior) {
            $historial->contador_impresora -= $registroAnterior->contador_impresora;
        }
    });
}
}
