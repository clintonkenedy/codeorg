<?php

namespace App\Http\Controllers;

use App\Models\Problema;
use Illuminate\Http\Request;

class ProblemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $problemas=Problema::all();
        return view('problema.index',compact('problemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('problema.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $problema = new Problema();
        $problema->titulo = $request->titulo;
        $problema->descripcion = $request->descripcion;
        $problema->entradas = $request->entradas;
        $problema->salidas = $request->salidas;
        $problema->restricciones = $request->restricciones;
        $problema->problema = $request->problema;
        $problema->solucion = $request->solucion;

        $problema->save();
        return redirect()->route('problemas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Problema  $problema
     * @return \Illuminate\Http\Response
     */
    public function show(Problema $problema)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Problema  $problema
     * @return \Illuminate\Http\Response
     */
    public function edit(Problema $problema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Problema  $problema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problema $problema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Problema  $problema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problema $problema)
    {
        //
        $problema->delete();
        return redirect()->route('problemas.index');
    }

    public function concurso()
    {
        //
        $problemas=Problema::all();
        return view('concurso.index',compact('problemas'));
    }
    public function verproblema($id)
    {
        //
        $problemas=Problema::all();
        $problema_=Problema::find($id);
        return view('concurso.index',compact('problemas','problema_'));
    }
    public function login()
    {
        // dd($request->all);
        // $problemas=Problema::all();
        return view('concurso.loginconcurso');
    }
    public function postlogin(Request $request)
    {
        dd($request->all);
        // $problemas=Problema::all();
        return view('concurso.index');
    }
}
