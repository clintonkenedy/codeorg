<?php

namespace App\Http\Controllers;

use App\Models\Puntuacion;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
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
        $puntuaciones=Auth::user()->puntuaciones;
        return view('reenviado.index',compact('reenviados','usuarios','puntuaciones'));
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
        $calificadores = User::role('admin')->get();
        $calificaid = Arr::pluck($calificadores, 'id');

        $tamcal=sizeof($calificaid);

        $teamid=auth()->guard('kids')->user()->id;
        $pts=DB::table('puntuacions')
            ->where('equipo_id','=',$teamid)
            ->where('problema_id','=',$request->input('problema'))
            ->get();
        $cpt=$pts->count();

        $ptusers = DB::table('puntuacions')
            ->whereIn('user_id', $calificaid)
            ->get();

        if(empty($ptusers->first())){
            $usuarioid=-1;
        }else{
            $lastpt=$ptusers->last()->user_id;
            $ismax=$lastpt==$calificaid[$tamcal-1];
            //dd($ismax);
            if($ismax){
                $usuarioid=-1;
            }else{
                $auxi=0;
                $usuarioid=0;
                //dd($calificaid);
                foreach ($calificaid as $califica){
                    if($lastpt==$califica){
                        $usuarioid=$auxi;

                    }
                    $auxi++;
                }

            }

        }



        //dd($auxi);
        //if($lastpt)
       // dd($pts->first()->id);
        $reenviado= new Puntuacion();
        $reenviado->equipo_id=$teamid;
        $reenviado->problema_id=$request->input('problema');
        $reenviado->user_id=$calificaid[$usuarioid+1];
        $reenviado->enlace=$request->input('enlace');
        $reenviado->reemix='hola2';
//        dd($nintentos);
        $reenviado->intentos=$cpt+1;
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
