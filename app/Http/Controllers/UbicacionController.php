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
        $areas = Area::all();
        $usuarios = User::all();
        $ubicaciones = Ubicacion::all();
        return view('paginas.ubicaciones.index',compact('areas','usuarios'))->with('ubicaciones', $ubicaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $usuarios = User::all();
        $areas = Area::all();
        return view('paginas.ubicaciones.create',compact('usuarios','areas'));
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
            'puesto'=>['required','string'],
            'usuario_id'=>['required'],
            'nombreRed'=>['required','string'],
            'grupoRed'=>['required','string'],
            'ip'=>['required','string'],
            'observaciones'=>[''],
            'area_id'=>['required'],
            'piso'=>['required']
        ]);

        Ubicacion::create([
           'puesto'=>$datos["puesto"],
           'usuario_id'=>$datos["usuario_id"],
           'nombreRed'=>$datos["nombreRed"],
           'grupoRed'=>$datos["grupoRed"],
           'ip'=>$datos["ip"],
           'observaciones'=>$datos["observaciones"],
           'area_id'=>$datos["area_id"],
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
