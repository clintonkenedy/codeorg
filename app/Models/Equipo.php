<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Equipo extends Authenticatable
{
    use HasFactory;
    protected $guard = 'kids';
    public function estudiantes(){
        return $this->hasMany(Estudiante::class);
    }
    public function puntuaciones(){
        return $this->hasMany(Puntuacion::class);
    }
}
