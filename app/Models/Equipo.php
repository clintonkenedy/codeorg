<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    public function estudiantes(){
        return $this->hasMany(Estudiante::class);
    }
    public function puntuaciones(){
        return $this->hasMany(Puntuacion::class);
    }
}
