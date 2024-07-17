<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toner;
use Illuminate\Support\Facades\DB;


class TonerController extends Controller
{
    public function index()
    {
        $toners = Toner::select('id','nombre', 'tipo', 'estado', 'fecha_compra', DB::raw('SUM(stock) as stock'))
        ->groupBy('id','nombre', 'tipo','estado', 'fecha_compra')
        ->get();
        return view('paginas.toners.index', compact('toners'));
    }

    public function create()
    {
        return view('paginas.toners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required|in:original,alternativo',
            'estado' => 'required',
            'stock' => 'required|integer',
            'fecha_compra' => 'required|date',
        ]);
    
        $tonerExistente = Toner::where('nombre', $request->nombre)->first();
    
        if ($tonerExistente) {
            // Si ya existe un toner con el mismo modelo, actualiza el stock
            $tonerExistente->stock += $request->stock;
            $tonerExistente->save();
        } else {
            // Si no existe, crea un nuevo toner
            Toner::create([
                'nombre' => $request->nombre,
                'tipo' => $request->tipo,
                'estado' => $request->estado,
                'stock' => $request->stock,
                'fecha_compra' => $request->fecha_compra,
            ]);
        }

        return redirect()->route('toners.index');
    }

    public function edit(Toner $toner)
    {
        return view('toners.edit', compact('toner'));
    }

    public function update(Request $request, Toner $toner)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required|in:original,alternativo',
            'estado' => 'required',
            'stock' => 'required|integer',
        ]);

        $toner->update($request->all());

        return redirect()->route('toners.index');
    }

    public function destroy(Toner $toner)
    {
        $toner->delete();

        return redirect()->route('toners.index');
    }
}
