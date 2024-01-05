<?php

namespace Database\Factories;

use App\Enums\ContinentEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->country(),
            'population' => fake()->numberBetween(800, 1400000000),
            'area' => fake()->numberBetween(2, 17098242),
            'continent' => fake()->randomElement(ContinentEnum::values()),
        ];
    }
}
