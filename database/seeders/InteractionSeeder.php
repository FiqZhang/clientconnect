<?php

namespace Database\Seeders;

use App\Models\Interaction;
use Illuminate\Database\Seeder;

class InteractionSeeder extends Seeder
{
    public function run(): void
    {
        Interaction::factory()->count(10)->create();
    }
    
}

