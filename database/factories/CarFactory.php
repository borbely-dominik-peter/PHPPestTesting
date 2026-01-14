<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Name' => $this->faker->words(3, true),
            'Cylinders' => $this->faker->numberBetween(4, 12),
            'Miles_per_Gallon' => $this->faker->randomFloat(1, 10, 50),
            'Displacement' => $this->faker->randomFloat(1, 100, 500),
            'Horsepower' => $this->faker->numberBetween(50, 1000),
            'Weight_in_lbs' => $this->faker->numberBetween(2000, 5000),
            'Acceleration' => $this->faker->randomFloat(1, 2, 20),
            'Year' => $this->faker->date(),
            'Origin' => $this->faker->country(),
        ];
    }
}
