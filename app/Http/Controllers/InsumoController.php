<?php

namespace App\Http\Controllers;
use App\Models\Insumo;
use App\Models\Ubicacion;
use App\Models\DetalleMovimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsumoController extends Controller
{
    public function index()
    {
        $insumos = Insumo::select('id','nombre', 'descripcion', 'tipo_insumo', 'fecha_compra','estado', 'ubicacion_id', DB::raw('SUM(stock) as stock'))
        ->groupBy('id','nombre', 'descripcion','tipo_insumo', 'fecha_compra','estado', 'ubicacion_id',)
        ->get();
        return view('paginas.insumos.index', compact('insumos'));
    }

    public function create()
    {
        return view('paginas.insumos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);

        $insumoExistente = Insumo::where('nombre', $request->nombre)->first();
    
        if ($insumoExistente) {
            // Si ya existe un insumo con el mismo modelo, actualiza el stock
            $insumoExistente->stock += $request->stock;
            $insumoExistente->save();
        } else {
            // Si no existe, crea un nuevo insumo
            Insumo::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'tipo_insumo' => $request->tipo_insumo,
                'estado' => $request->estado,
                'fecha_compra' => $request->fecha_compra,
                'stock' => $request->stock,
            ]);
        }
        return redirect()->route('insumos.index')->with('InsumoCreado', 'OK');
    }

    public function show(Insumo $insumo)
    {
        return view('insumos.show', compact('insumo'));
    }

    public function edit(Insumo $insumo)
    {
        return view('insumos.edit', compact('insumo'));
    }

    public function update(Request $request, Insumo $insumo)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);

        $insumo->update($request->all());

        return redirect()->route('insumos.index')->with('success', 'Insumo actualizado exitosamente');
    }

    public function destroy(Insumo $insumo)
    {
        $insumo->delete();

        return redirect()->route('insumos.index')->with('success', 'Insumo eliminado exitosamente');
    }

    public function asignarFormulario(Insumo $insumo)
{
    $ubicaciones = Ubicacion::all(); // Asumiendo que tienes un modelo Ubicacion
    return view('paginas.insumos.asignar', compact('insumo', 'ubicaciones'));
}

public function historial(Insumo $insumo)
{
    $historial = DetalleMovimiento::where('insumo_id', $insumo->id)->get();
    return view('paginas.insumos.historial', compact('historial', 'insumo'));
}

public function asignar(Request $request, Insumo $insumo)
{
    $request->validate([
        'ubicacion_id' => 'required|exists:ubicaciones,id',
        'fecha_instalacion' => 'required|date',
    ]);

    // Verificar si hay suficiente stock para asignar
    if ($insumo->stock <= 0) {
        return redirect()->route('insumos.index')->with('error', 'No hay suficiente stock para asignar');
    }

    DetalleMovimiento::create([
        'insumo_id' => $insumo->id,
        'ubicacion_id' => $request->ubicacion_id,
        'fecha_instalacion' => $request->fecha_instalacion,
    ]);

    // Actualiza el campo ubicacion_id en la tabla insumos
    $insumo->update(['ubicacion_id' => $request->ubicacion_id]);

    // Decrementar el stock en una unidad
    $insumo->decrement('stock');

    return redirect()->route('insumos.index')->with('success', 'Insumo asignado exitosamente');

    
}

}
