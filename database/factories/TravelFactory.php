<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\ParticipantCategory;
use App\Models\TravelCategory;
use App\Models\VineyardCategory;
use App\Models\WineRoad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'wine_road_id' => WineRoad::all()->random()->id,
            'department_id' => Department::all()->random()->id,
            'travel_category_id' => TravelCategory::all()->random()->id,
            'vineyard_category_id' => VineyardCategory::all()->random()->id,
            'participant_category_id' => ParticipantCategory::all()->random()->id,
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'price_per_person' => fake()->randomFloat(2, 100, 300),
            'days' => fake()->randomElement(['0.5', '1', '2', '3']),
        ];
    }
}
