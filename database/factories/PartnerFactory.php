<?php

namespace Database\Factories;

use App\Models\ActivityType;
use App\Models\Address;
use App\Models\Hotel;
use App\Models\OtherPartner;
use App\Models\Partner;
use App\Models\Restaurant;
use App\Models\WineCellar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        
    

        return [
            'activity_type_id' => $activity_type_id,
            'address_id' => Address::all()->random()->id,
            'name' => $name,
            'email' => fake()->companyEmail(),
            'description' => $description,
            'phone' => fake()->phoneNumber()
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function(Partner $partner) {
            if($partner->activity_type->name == 'Hotel') {
                Hotel::factory(1)->state(['partner_id' => $partner->id])->create();
            } elseif($partner->activity_type->name == 'Restaurant') {
                Restaurant::factory(1)->state(['partner_id' => $partner->id])->create();
            } elseif($partner->activity_type->name == 'Cave') {
                WineCellar::factory(1)->state(['partner_id' => $partner->id])->create();
            } else {
                OtherPartner::factory(1)->state(['partner_id' => $partner->id])->create();
            }
        });
    }
}
