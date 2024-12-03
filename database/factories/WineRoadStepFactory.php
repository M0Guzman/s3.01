<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\GPSCoordinate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WineRoadStep>
 */
class WineRoadStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $is_gps = fake()->boolean();

        return [
            'g_p_s_coordinate_id' => $is_gps ? GPSCoordinate::factory() : null,
            'address_id' => $is_gps ? null : Address::all()->random()->id,
            'name' => fake()->sentence()
        ];
    }
}
