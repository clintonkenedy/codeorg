<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use App\Models\Problema;
use App\Models\Puntuacion;
use Livewire\Component;

class Escuchar extends Component
{
    protected $listeners = ['emitir1'=> 'render'];
    public function render()
    {
        $equipos = Equipo::all()->sortByDesc('puntuacion');
        $puntos = Puntuacion::where('estado', 'Aceptado')->where('equipo_id',$equipos[0]->id)->get()->count();
        return view('livewire.escuchar', compact('equipos', 'puntos'));
    }
}
