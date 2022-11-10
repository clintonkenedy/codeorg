<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Puntuacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $ptjbase=71;
        $ptjfinal=0;
        $puesto=0;
        $ptctotal=0;
        $puntuaciones = Puntuacion::all();
        $team=auth()->guard('kids')->user();
        $puntuacion_ = Puntuacion::find($id);
        $score=Equipo::find($team->id);
        //dd($puntuacion_->problema->valor);
        if($estado=='Aceptado'){

            $acepglobal=DB::table('puntuacions')
                ->where('problema_id',$puntuacion_->problema_id)
                ->where('estado','Aceptado')
                ->where('puesto','!=',0)
                ->get()->last();

            $acep=DB::table('puntuacions')
                ->where('problema_id',$puntuacion_->problema_id)
                ->where('estado','Aceptado')
                ->where('equipo_id',$team->id)
                ->get()->last();
            //dd($acep);
            $nohayacepglobal=empty($acepglobal);
            $nohayacep=empty($acep);

            if($nohayacepglobal){
                $puesto=1;
                if($puntuacion_->intentos ==1){
                    $ptjfinal=$ptjbase-$puesto;

                    $ptjfinal=$ptjfinal+10;
                    $ptjfinal=$ptjfinal+$puntuacion_->problema->valor;
                    $ptctotal=$score->puntuacion+$ptjfinal;
                }else{
                    $ptjfinal=$ptjbase-$puesto;
                    $ptjfinal=$ptjfinal+$puntuacion_->problema->valor;
                    $ptctotal=$score->puntuacion+$ptjfinal;
                }

                //dd($puesto);

            }elseif($nohayacep){
                $puesto=$acepglobal->puesto+1;
                if($puntuacion_->intentos ==1){
                    $ptjfinal=$ptjbase-$puesto;
                    $ptjfinal=$ptjfinal+10;

                    $ptjfinal=$ptjfinal+$puntuacion_->problema->valor;

                    $ptctotal=$score->puntuacion+$ptjfinal;
                }else{
                    $ptjfinal=$ptjbase-$puesto;
                    $ptjfinal=$ptjfinal+$puntuacion_->problema->valor;
                    $ptctotal=$score->puntuacion+$ptjfinal;
                }
                //dd($ptjfinal);
                //dd($puesto);
            }
        }
        $puntuacion_->estado = $estado;
        $puntuacion_->puesto = $puesto;
        $puntuacion_->puntaje = $ptjfinal;

        $puntuacion_->save();

        $cantresueltos=DB::table('puntuacions')
            ->where('equipo_id',$team->id)
            ->where('puesto','!=',0)->get()->count();
        //dd($ptjbase-$puntuacion_->puesto);

        //$score=Equipo::find($team->id);
        if(!$ptctotal==0){
            $score->puntuacion=$ptctotal;
            $score->save();
        }




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
