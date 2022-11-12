<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EquipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' =>$this->faker->name(),
            'codigo' =>$this->faker->randomNumber(6,true),
            'aceptados'=>0,
            'puntuacion' => 0,
        ];
    }
}
