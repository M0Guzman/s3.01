<?php

namespace Database\Factories;

use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
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
            'adult_count' => fake()->numberBetween(1, 2),
            'children_count' => fake()->numberBetween(0, 3),
            'room_count' => fake()->numberBetween(1, 2),
            'start_date' => fake()->date()
        ];
    }
}
