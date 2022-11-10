<?php

namespace App\Http\Controllers;

use App\Models\Puntuacion;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puntuaciones = Puntuacion::all();
        return view('calificacion.index', compact('puntuaciones'));
    }
    public function vercalificacion($id)
    {
        $puntuaciones = Puntuacion::all();
        $puntuacion_ = Puntuacion::find($id);
        return view('calificacion.index', compact('puntuaciones', 'puntuacion_'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $estado)
    {
        dd($estado);
        $puntuacion_ = Puntuacion::find($id);
        $puntuacion_->estado = $estado;
        $puntuacion_->save();
        return view('calificacion.index', compact('puntuaciones', 'puntuacion_'));
    }

    public function estado($id, $estado)
    {
        $puntuaciones = Puntuacion::all();
        $puntuacion_ = Puntuacion::find($id);
        $puntuacion_->estado = $estado;
        $puntuacion_->save();
        return redirect()->route('calificaciones.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
