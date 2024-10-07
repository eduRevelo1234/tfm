<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DispositivoIoT>
 */
class DispositivoIoTFactory extends Factory
{
    public function definition(): array
    {
        return [
            'tipo' => $this->faker->randomElement(['sensor_humedad', 'sensor_temperatura']),
            'estado' => $this->faker->boolean(),
            'id_zona' => \App\Models\ZonaRiego::factory(), // Relación con la zona de riego
        ];
    }
}
