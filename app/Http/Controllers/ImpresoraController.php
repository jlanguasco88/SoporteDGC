<?php

namespace App\Http\Controllers;
use App\Models\Toner;
use App\Models\Ubicacion;
use App\Models\Impresora;
use App\Models\DetallesCambioToner;
use Illuminate\Http\Request;

class ImpresoraController extends Controller
{
    public function index()
    {
        $impresoras = Impresora::all();
        return view('paginas.impresoras.index', compact('impresoras'));
    }

    public function create()
    {
        $toners = Toner::all();
        $ubicaciones = Ubicacion::all();
        return view('paginas.impresoras.create', compact('toners', 'ubicaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'orden' => 'required|string',
            'serie' => 'required|string',
            'nombre' => 'required|string',
            'toner_id' => 'required|exists:toners,id',
            'ubicacion_id' => 'required|exists:ubicaciones,id',
            'estado' => 'required|string',
            'descripcion' => 'nullable|string',
        ]);

        Impresora::create($request->all());

        return redirect()->route('impresoras.index');
    } 
    
    public function cambiarToner(Impresora $impresora)
{
    $toners = Toner::all(); // Obtén la lista de todos los toners

    // Puedes pasar los toners a la vista para que el usuario seleccione uno
    return view('paginas.impresoras.cambiar_toner', compact('impresora', 'toners'));
}

public function guardarCambioToner(Request $request, Impresora $impresora)
{
    $request->validate([
        'toner_id' => 'required|exists:toners,id',
        'motivo' => 'required|string',
        'fecha_cambio' => 'required|date',
        'contador_impresora' => 'required|integer',
    ]);

    // Guardar los detalles del cambio de toner en la tabla detalles_cambio_toner
    $impresora->DetallesCambioToner()->create([
        'toner_id' => $request->toner_id,
        'fecha_cambio' => $request->fecha_cambio,
        'contador_impresora' => $request->contador_impresora,
        'motivo' => $request->motivo,
    ]);

    // Actualizar el toner asociado a la impresora
    $impresora->toner_id = $request->toner_id;
    $impresora->save();

    return redirect()->route('impresoras.index')->with('success', 'Cambio de toner realizado con éxito.');
}



}
