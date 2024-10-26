<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        // Set the locale to Malaysian
        $faker = Faker::create('ms_MY');

        return [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'id_number' => $faker->unique()->numerify('ID#####'), // Example ID format
            'phone_number' => $faker->phoneNumber,
            'address' => $faker->address,
            'notes' => $faker->sentence,
        ];
    }
}
