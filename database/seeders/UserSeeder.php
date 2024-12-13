<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            'first_name' => 'baptiste',
            'last_name' => 'Jean',
            'gender' => 'H',
            'birth_date' => fake()->date(),
            'mobile' => fake()->phoneNumber(),
            'email' => 'jean@gmail.com',
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
            'password' => Hash::make('babou'),
            'remember_token' => Str::random(10)
        ]);

        
    }
}
