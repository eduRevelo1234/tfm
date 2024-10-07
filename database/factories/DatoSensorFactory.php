<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DatoSensor>
 */
class DatoSensorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'fecha_hora' => $this->faker->dateTime(),
            'valor' => $this->faker->randomFloat(2, 10, 40),
            'tipo_dato' => $this->faker->randomElement(['humedad', 'temperatura']),
            'id_dispositivo' => \App\Models\DispositivoIoT::factory(), // Relación con el dispositivo
        ];
    }
}
