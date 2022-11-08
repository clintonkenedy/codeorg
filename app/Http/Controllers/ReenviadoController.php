<?php

namespace App\Http\Controllers;

use App\Models\Puntuacion;
use Illuminate\Http\Request;
use App\Models\User;

class ReenviadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reenviados=Puntuacion::where('user_id',);
        $usuarios = User::role('admin')->get(); // Returns only users with the role 'writer'
//        dd($users->first()->puntuaciones);
        return view('reenviado.index',compact('reenviados','usuarios'));
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

        $reenviado= new Puntuacion();
        $reenviado->equipo_id=auth()->guard('kids')->user()->id;
        $reenviado->problema_id=$request->input('problema');
        $reenviado->user_id=1;
        $reenviado->enlace='hola';
        $reenviado->reemix='hola2';
        $reenviado->intentos=1;
        $reenviado->estado='Rechazado';
        $reenviado->puesto=2;
        $reenviado->save();

        return redirect()->back();

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
    public function edit($id)
    {
        //
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
        $puntuacion=Puntuacion::find($id);

        $puntuacion->reemix=$request->input('reemix');
        $puntuacion->save();
        return redirect()->route('reenviados.index');


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
