<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model
{
    use HasFactory;
    public function equipo(){
        return $this->belongsTo(Equipo::class);
    }
    public function problema(){
        return $this->belongsTo(Problema::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
