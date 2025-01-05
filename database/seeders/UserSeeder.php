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
            'remember_token' => Str::random(10),
            'user_role_id' => 1
        ]);

        User::create([
            'first_name' => 'Service_vente',
            'last_name' => 'Jean',
            'gender' => 'H',
            'birth_date' => fake()->date(),
            'mobile' => fake()->phoneNumber(),
            'email' => 'Service_vente@gmail.com',
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
            'password' => Hash::make('babou'),
            'remember_token' => Str::random(10),
            'user_role_id' => 2
        ]);
        
        User::create([
            'first_name' => 'Directeur_service_vente',
            'last_name' => 'Jean',
            'gender' => 'H',
            'birth_date' => fake()->date(),
            'mobile' => fake()->phoneNumber(),
            'email' => 'Directeur_service_vente@gmail.com',
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
            'password' => Hash::make('babou'),
            'remember_token' => Str::random(10),
            'user_role_id' => 3
        ]);
        
        User::create([
            'first_name' => 'Service_marketing',
            'last_name' => 'Jean',
            'gender' => 'H',
            'birth_date' => fake()->date(),
            'mobile' => fake()->phoneNumber(),
            'email' => 'Service_marketing@gmail.com',
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
            'password' => Hash::make('babou'),
            'remember_token' => Str::random(10),
            'user_role_id' => 4
        ]);
        
        User::create([
            'first_name' => 'Dirigeant',
            'last_name' => 'Jean',
            'gender' => 'H',
            'birth_date' => fake()->date(),
            'mobile' => fake()->phoneNumber(),
            'email' => 'dirigeant@gmail.com',
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
            'password' => Hash::make('babou'),
            'remember_token' => Str::random(10),
            'user_role_id' => 5
        ]);

        
    }
}