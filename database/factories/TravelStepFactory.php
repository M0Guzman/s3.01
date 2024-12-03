<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TravelStep>
 */
class TravelStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'travel_id' => Travel::all()->random()->id,
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
        ];
    }
}
