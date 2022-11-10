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
        $equipos = Equipo::all();
        return view('livewire.escuchar', compact('equipos'));
    }
}
