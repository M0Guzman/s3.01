<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRole::insert([
            [
                'id' => 0,
                'name' => 'user'
            ],
            [
                'id' => 1,
                'name' => 'admin'
            ]
        ]);
    }
}
