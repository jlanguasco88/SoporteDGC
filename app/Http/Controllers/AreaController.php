<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    
    public function index()
    {
        
        $areas = Area::all();
        
        return view('paginas.areas.index', compact('areas'));
    }

    
    public function create()
    {
        //el formulario donde agregamos los datos
        return view('paginas.areas.create');
    }

    
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Crear un nuevo registro en la base de datos
        Area::create([
            'area' => $request->input('nombre'),
        ]);

        // Redirigir a la lista de áreas con un mensaje de éxito
        return redirect()->route('areas.index')->with('AreaCreada','OK');
    }

    
    public function show(Area $area)
    {
        //sirve para mostrar un registro de la tabla 
    }

    
    public function edit($idarea)
    {
        //sirva para traer los datos que se van a editar y los coloca en un formulario

        $area = Area::findOrFail($idarea);
        return view('paginas.areas.edit', compact('area'));
    }

    
    public function update(Request $request, $idarea)
    {
        // Validar los datos de entrada
        $request->validate([
            'area' => 'required|string|max:255',
        ]);

        // Obtener el registro y actualizarlo
        $area = Area::findOrFail($idarea);
        $area->update([
            'area' => $request->input('area'),
        ]);

        // Redirigir a la lista de áreas con un mensaje de éxito
        return redirect()->route('areas.index')->with('AreaActualizada','OK');
    }

    
    public function destroy($idarea)
    {
        $area = Area::findOrFail($idarea);
        $area->delete();

        // Redirigir a la lista de áreas con un mensaje de éxito
        return redirect()->route('areas.index')->with('AreaEliminada','OK');
    }
}
