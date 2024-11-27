<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WineRoad;

class TravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WineRoad::insert([
            'name' => fake()->realText(20),
            'description' => fake()->realText(250),
        ]);
    }
}
