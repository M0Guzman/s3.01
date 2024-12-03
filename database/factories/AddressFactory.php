<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),
            'street' => fake()->streetAddress(),
            'phone' => str_replace('+33', '0', str_replace('+33(0)', '0', str_replace(' ', '', fake()->phoneNumber()))),
            'city_id' => City::factory()
        ];
    }
}
