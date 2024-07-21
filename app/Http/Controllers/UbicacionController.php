<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use App\Models\User;
use App\Models\Area;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubicaciones = Ubicacion::with('area')->get();
        return view('paginas.ubicaciones.index', compact('ubicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $areas = Area::all();
        $gruposRed = Ubicacion::select('grupoRed')->distinct()->pluck('grupoRed');

        return view('paginas.ubicaciones.create',compact('gruposRed','areas'));
        //el formulario donde agregamos los datos
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->validate([
            'puesto'=>['required'],
            'usuario'=>['required','string'],
            'nombreRed'=>['required','string'],
            'grupoRed'=>['required','string'],
            'ip'=>['required','string'],
            'observaciones'=>[''],
            'area_idarea'=>['required'],
            'piso'=>['required']
        ]);

        Ubicacion::create([
           'puesto'=>$datos["puesto"],
           'usuario'=>$datos["usuario"],
           'nombreRed'=>$datos["nombreRed"],
           'grupoRed'=>$datos["grupoRed"],
           'ip'=>$datos["ip"],
           'observaciones'=>$datos["observaciones"],
           'area_idarea'=>$datos["area_idarea"],
           'piso'=>$datos["piso"]
        ]);

        return redirect()->route('ubicaciones.index')->with('UbicacionCreada','OK');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function show(Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ubicacion $ubicacion)
    {
        //
    }
}
