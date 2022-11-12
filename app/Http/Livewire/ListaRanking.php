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
//use Illuminate\Support\Carbon;
use Carbon\Carbon;

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
        dd($calificaid);
        $tamcal=sizeof($calificaid);
        
        $ptjbase=71;
        $horabase = Carbon::create(2022, 11, 11, 22, 12, 0);
        $horabase2 = Carbon::create(2022, 11, 11, 22, 22, 0);
        //        $diff=$horabase->longRelativeDiffForHumans($horabase2);
        
        //$diff=$horabase->diffAsCarbonInterval($horabase2);
        $horaf=Carbon::createFromTime(0, 0, 0);
        $horateamf=Carbon::createFromTime(0, 0, 0);
        //dd($horaf);
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
                    $diff=$horabase->diffAsCarbonInterval($puntuacion_->created_at);
                    $horaf=Carbon::createFromTime($diff->hours, $diff->minutes, $diff->seconds);
                    /*$ptjfinal=$ptjbase-$puesto;
                    
                    $ptjfinal=$ptjfinal+10;
                    $ptjfinal=$ptjfinal+$puntuacion_->problema->valor;*/
                    //$ptctotal=$score->puntuacion+$horaf;
                    $horateamf=Carbon::parse($score->puntuacion);
                    //                    dd($horateamf);
                    $horateamf->addHours($horaf->hour);
                    $horateamf->addMinutes($horaf->minute);
                    $horateamf->addSeconds($horaf->second);
                    //dd($horateamf);
                }else{
                    $diff=$horabase->diffAsCarbonInterval($puntuacion_->created_at);
                    $horaf=Carbon::createFromTime($diff->hours, $diff->minutes, $diff->seconds);
                    
                    /*$ptjfinal=$ptjbase-$puesto;
                    $ptjfinal=$ptjfinal+$puntuacion_->problema->valor;*/
                    /*$ptctotal=$score->puntuacion+$ptjfinal;*/
                    $horateamf=Carbon::parse($score->puntuacion);
                    $horateamf->addHours($horaf->hour);
                    $horateamf->addMinutes($horaf->minute);
                    $horateamf->addSeconds($horaf->second);
                }
                
                //dd($puesto);
                
            }elseif($nohayacep){
                $puesto=$acepglobal->puesto+1;
                if($puntuacion_->intentos ==1){
                    $diff=$horabase->diffAsCarbonInterval($puntuacion_->created_at);
                    $horaf=Carbon::createFromTime($diff->hours, $diff->minutes, $diff->seconds);
                    
                    /*$ptjfinal=$ptjbase-$puesto;
                    $ptjfinal=$ptjfinal+10;
                    
                    $ptjfinal=$ptjfinal+$puntuacion_->problema->valor;*/
                    
                    //                    $ptctotal=$score->puntuacion+$ptjfinal;
                    $horateamf=Carbon::parse($score->puntuacion);
                    
                    $horateamf->addHours($horaf->hour);
                    $horateamf->addMinutes($horaf->minute);
                    $horateamf->addSeconds($horaf->second);
                }else{
                    $diff=$horabase->diffAsCarbonInterval($puntuacion_->created_at);
                    $horaf=Carbon::createFromTime($diff->hours, $diff->minutes, $diff->seconds);
                    
                    /*$ptjfinal=$ptjbase-$puesto;
                    $ptjfinal=$ptjfinal+$puntuacion_->problema->valor;*/
                    //                    $ptctotal=$score->puntuacion+$ptjfinal;
                    $horateamf=Carbon::parse($score->puntuacion);
                    
                    $horateamf->addHours($horaf->hour);
                    $horateamf->addMinutes($horaf->minute);
                    $horateamf->addSeconds($horaf->second);
                }
                
                //dd($ptjfinal);
                //dd($puesto);
            }
        }
        $puntuacion_->estado = $estado;
        $puntuacion_->puesto = $puesto;
        $puntuacion_->puntaje = $horaf;

        $puntuacion_->save();
        
        $cantresueltos=DB::table('puntuacions')
            ->where('equipo_id',$team->id)
            ->where('puesto','!=',0)->get()->count();
            //dd($ptjbase-$puntuacion_->puesto);
            
            //$score=Equipo::find($team->id);
            $cantresueltos=DB::table('puntuacions')
            ->where('equipo_id',$team->id)
            ->where('puesto','!=',0)->get()->count();
            if(!$horateamf==0){
                //            dd($horateamf);
                //            $score->puntuacion=$ptctotal;
                $score->puntuacion=$horateamf;
                $score->aceptados=$cantresueltos;
                $score->save();
            }
            
            // $this->emit('render');
            event(new testevent("clinton"));
            return redirect()->route('calificaciones.index');
    }
    public function render()
    {
        return view('livewire.lista-ranking');
    }
}
