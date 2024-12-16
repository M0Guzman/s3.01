<?php

namespace Database\Factories;

use App\Models\ActivityCategory;
use App\Models\Partner;
use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;
use Str;

class CouponFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code' => Str::random(),
            'value'=> fake()->randomFloat(2,100, 1000),
            'expiration_date' => fake()->dateTimeBetween('13-06-2025','13-06-2026'),
        ];
    }
}