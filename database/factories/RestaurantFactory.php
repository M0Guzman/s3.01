<?php

namespace Database\Factories;

use App\Models\CookingType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cooking_type_id' => CookingType::all()->random()->id,
            'ranking' => fake()->randomNumber(3, 5),
            'speciality' => fake()->word()
        ];
    }
}
