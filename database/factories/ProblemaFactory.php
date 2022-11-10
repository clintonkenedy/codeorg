<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProblemaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo'=>$this->faker->name(),
            'descripcion'=>$this->faker->text(),
            'entradas'=>$this->faker->text(),
            'salidas'=>$this->faker->text(),
            'restricciones'=>$this->faker->text(),
            'problema'=>$this->faker->name(),
            'solucion'=>$this->faker->text(),
        ];
    }
}
