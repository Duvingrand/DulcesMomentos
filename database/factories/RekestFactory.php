<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Rekest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rekest>
 */
class RekestFactory extends Factory
{
    /**
     * El nombre del modelo correspondiente a la fábrica.
     *
     * @var string
     */
    protected $model = Rekest::class;

    /**
     * Define el estado predeterminado del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'delivery_day' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'), // Fecha de entrega en el futuro, máximo 1 mes
            'client_id' => Client::all()->random()->id, // Selecciona un cliente aleatorio de la base de datos
            'status' => 'Pendiente', // Estado inicial de la reservación
        ];
    }
}
