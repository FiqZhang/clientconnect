<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 users with fake data
        User::factory()->count(10)->create([
            'password' => Hash::make('password'), // Set a default password for all users
        ]);

     
    }
}
