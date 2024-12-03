<?php

namespace Database\Factories;

use App\Models\OtherPartnerActivityType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OtherPartner>
 */
class OtherPartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'other_partner_activity_type_id' => OtherPartnerActivityType::all()->random()->id
        ];
    }
}
