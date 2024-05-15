<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'editorial_id' => $this->faker->numberBetween(1, 10),
            'edicion' => $this->faker->numberBetween(1, 10),
            'pais' => $this->faker->country,
            'precio' => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}
