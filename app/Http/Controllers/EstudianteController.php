<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiante = Estudiante::all();
        return view('estudiante.index', compact('estudiante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipo = Equipo::all();
        return view('estudiante.create', compact('equipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidop' => 'required',
            'apellidom' => 'required',
            'dni' => 'required',
            'equipo' => 'required',
        ]);

        $estudiante = new Estudiante();

        $estudiante->nombre = $request->nombre;
        $estudiante->apellido_p = $request->apellidop;
        $estudiante->apellido_m = $request->apellidom;
        $estudiante->dni = $request->dni;
        $estudiante->equipo_id = $request->equipo;

        $estudiante->save();

        return redirect()->route('estudiantes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        $equipo = Equipo::all();
        return view('estudiante.edit', compact('estudiante','equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidop' => 'required',
            'apellidom' => 'required',
            'dni' => 'required',
            'equipo' => 'required',
        ]);

        $estudiante->nombre = $request->nombre;
        $estudiante->apellido_p = $request->apellidop;
        $estudiante->apellido_m = $request->apellidom;
        $estudiante->dni = $request->dni;
        $estudiante->equipo_id = $request->equipo;

        $estudiante->save();

        return redirect()->route('estudiantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index');
    }
}
