<?php

namespace Database\Factories;

use App\Models\Travel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
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
            'user_id' => User::all()->random()->id,
            'rating' => fake()->randomFloat(1, 0, 5),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph()
        ];
    }
}
