<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
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
            'apellido_p' =>$this->faker->name(),
            'apellido_m' =>$this->faker->name(),
            'dni' =>$this->faker->randomNumber(8,true),
            'equipo_id' =>$this->faker->numberBetween(1,3)

        ];
    }
}
