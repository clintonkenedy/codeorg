<?php

namespace App\Http\Livewire;

use App\Events\testevent;
use App\Models\Equipo;
use App\Models\Problema;
use App\Models\Puntuacion;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListaRanking extends Component
{


    public function like()
    {

        // Problema::created(
        //     [

        //         'title' => "nuevo",
        //         'descripcion' => "nuevo",
        //         'entradas' => "nuevo",
        //         'salidas' => "nuevo",
        //         'restriciones' => "nuevo",
        //         'problema' => "nuevo",
        //         'solucion' => "nuevo",
        //     ]
        // );
        $problema = new Problema();
        $problema->titulo = 'nuevo';
        $problema->descripcion ='nuevo';
        $problema->entradas ='nuevo';
        $problema->salidas ='nuevo';
        $problema->restricciones = 'nuevo';
        $problema->problema = 'nuevo';
        $problema->solucion ='nuevo';

        $problema->save();
        // $this->emit('emitir1');

        event(new testevent("mensaje"));
    }
    public function estado($id, $estado)
    {
        $calificadores = User::role('calificador')->get();
        $calificaid = Arr::pluck($calificadores, 'id');
        $tamcal=sizeof($calificaid);

        $ptjbase=71;
        $ptjfinal=0;
        $puesto=0;
        $ptctotal=0;
        $puntuaciones = Puntuacion::all();
       /* $team=auth()->guard('kids')->user();*/
        $puntuacion_ = Puntuacion::find($id);
        $team=$puntuacion_->equipo;
        //dd($team);
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

        $this->emit('render');
        event(new testevent("clinton"));
        return redirect()->route('calificaciones.index');
    }
    public function render()
    {
        return view('livewire.lista-ranking');
    }
}
