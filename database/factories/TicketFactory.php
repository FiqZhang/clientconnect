<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker; 

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        $faker = Faker::create('ms_MY'); 

        return [
            'customer_id' => Customer::factory(), // Generates a new customer if not provided
            'assigned_to' => User::factory(), // Generates a new user if not provided
            'title' => $faker->sentence(), // Use Malaysian locale for title
            'description' => $faker->paragraph(), // Use Malaysian locale for description
            'status' => $this->faker->randomElement(['open', 'in progress', 'resolved', 'closed']), // Random status
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']), // Random priority
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
