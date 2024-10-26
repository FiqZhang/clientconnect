<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        // Generate 10 tickets with associated customers and users
        Ticket::factory()->count(10)->create();
    }
}

