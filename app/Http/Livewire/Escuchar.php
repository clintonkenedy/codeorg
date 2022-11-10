<?php

namespace App\Http\Livewire;

use App\Models\Problema;
use App\Models\Puntuacion;
use Livewire\Component;

class Escuchar extends Component
{
    protected $listeners = ['emitir1'=> 'render'];
    public function render()
    {
        $problemas = Problema::all();
        return view('livewire.escuchar', compact('problemas'));
    }
}
