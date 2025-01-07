<?php

namespace Database\Factories;

use App\Models\OrderState;
use App\Models\PaymentType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->random();

        return [
            'payment_type_id' => PaymentType::all()->random()->id,
            'user_id' => $user->id,
            'address_id' => $user->addresses->random()->id,
            'message' => fake()->paragraph(),
            'order_state_id' => OrderState::all()->random()->id,
            'created_at' => fake()->dateTimeBetween('-3 month')
        ];
    }
}
