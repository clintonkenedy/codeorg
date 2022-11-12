<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Temporizador extends Component
{
    protected $listeners = ['emitir1'=> 'render'];
    public function render()
    {
        return view('livewire.temporizador');
    }
}
