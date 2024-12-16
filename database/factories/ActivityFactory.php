<?php

namespace Database\Factories;

use App\Models\ActivityCategory;
use App\Models\Partner;
use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->numberBetween(8, 18);
        $end = $start + fake()->numberBetween(1, 3);

        return [
            'partner_id' => Partner::factory(),
            'activity_category_id' => ActivityCategory::all()->random()->id,
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'timeslot' => $start . "h00-" . $end . "h00",
            'adult_price' => fake()->randomFloat(2,100, 400),
            'children_price' => fake()->randomFloat(2,100, 400),
        ];
    }
}
