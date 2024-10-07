<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ZonaRiego>
 */
class ZonaRiegoFactory extends Factory
{
   public function definition(): array
    {
        return [
            'nombre_zona' => $this->faker->word(),
            'ubicacion' => $this->faker->address(),
            'humedad_min' => $this->faker->randomFloat(2, 10, 20),
            'humedad_max' => $this->faker->randomFloat(2, 30, 40),
            'temperatura_min' => $this->faker->randomFloat(2, 15, 25),
            'temperatura_max' => $this->faker->randomFloat(2, 30, 35),
            'id_usuario' => \App\Models\Usuario::factory(), // Relación con el usuario
        ];
    }
}
