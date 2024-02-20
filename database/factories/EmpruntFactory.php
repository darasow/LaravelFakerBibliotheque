<?php

namespace Database\Factories;

use Database\Factories\Livre;
use Database\Factories\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmpruntFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
     
        return [
           'livre_id' => \App\Models\Livre::factory(),
            'client_id' => \App\Models\Client::factory(),
            'date_emprunt' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'date_retour' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
