<?php

namespace App\Http\Livewire;

use App\Events\testevent;
use App\Models\Problema;
use App\Models\Puntuacion;
use Livewire\Component;

class ListaRanking extends Component
{

    public function render()
    {
        return view('livewire.lista-ranking');
    }
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
}
