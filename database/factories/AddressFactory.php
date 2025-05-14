<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'user_id' => \App\Models\User::factory(),
        'recipient_name' => $this->faker->name(),
        'phone' => $this->faker->phoneNumber(),
        'address' => $this->faker->address(),
        'city' => $this->faker->city(),
        'province' => $this->faker->city(),
        'postal_code' => $this->faker->postcode(),
        ];
    }
}
