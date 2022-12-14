<?php

namespace App\Http\Controllers;

use App\Models\Problema;
use App\Models\Puntuacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Equipo;
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
        $problema->valor = $request->valor;
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
    public function edit($id)
    {
        //
        $problema=Problema::find($id);

        return view('problema.editar',compact('problema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Problema  $problema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $problema=Problema::find($id);

        $problema->titulo=$request->input('titulo');
        $problema->valor=$request->input('valor');
        $problema->descripcion=$request->input('descripcion');
        $problema->entradas=$request->input('entradas');
        $problema->salidas=$request->input('salidas');
        $problema->restricciones=$request->input('restricciones');
        $problema->problema=$request->input('problema');
        $problema->solucion=$request->input('solucion');
        $problema->save();
        return redirect()->route('problemas.index');

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
        /*session(['alpha'=>'developer']);*/
        //dd(session()->get('alpha'));
        $team=auth()->guard('kids')->user();

        $estudiantes=DB::table('estudiantes')->where('equipo_id',$team->id)->get();
        $problemas=Problema::all();
        //dd($problemas);
        return view('concurso.index',compact('problemas','estudiantes'));
    }

    public function verproblema($id)
    {
        //
        $problemas=Problema::all();
        $problema_=Problema::find($id);

        $team=auth()->guard('kids')->user();
        $envios=DB::table('puntuacions')->where('equipo_id',$team->id)->where('problema_id',$id)->get();

        $estudiantes=DB::table('estudiantes')->where('equipo_id',$team->id)->get();
        $aceptado = Puntuacion::where('estado', 'Aceptado')->where('equipo_id',$team->id)->where('problema_id',$id)->first();
        $esperando = Puntuacion::where('estado', 'Enviado')->where('equipo_id',$team->id)->where('problema_id',$id)->first();
        return view('concurso.index',compact('problemas','problema_','estudiantes','envios','aceptado','esperando'));
    }

    public function getranking(){
        // --
        $puntuacion=Puntuacion::all();
        return view('concurso.ranking');
    }

    public function onlytest(){
        // --
        //$puntuacion=Puntuacion::all()->sortByDesc('aceptados');
        $equipos1 = Equipo::all()->sortByDesc('puntuacion')->reverse()->values()->groupBy('aceptados');
        $equipos=$equipos1->reverse()->values();
        //dd($equipos->reverse()->values()[0][0]->nombre);
        //$equipos = $equipos1->sortByDesc('puntuacion')->reverse()->values();

        //dd($equipos);
        return view('concurso.test',compact('equipos'));
    }
}
