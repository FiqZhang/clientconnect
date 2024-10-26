<?php

namespace Database\Factories;

use App\Models\Interaction;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class InteractionFactory extends Factory
{
    protected $model = Interaction::class;
    protected $faker;

    public function __construct()
    {
        parent::__construct();
        $this->faker = Faker::create('ms_MY'); // Create a localized Faker instance
    }

    public function definition()
    {
        return [
            'customer_id' => Customer::factory(), // Create a customer if not provided
            'type' => $this->faker->randomElement(['email', 'phone call', 'meeting']),
            'interaction_date' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'notes' => $this->faker->sentence(),
        ];
    }
}
