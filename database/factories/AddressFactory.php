<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->unique()->random()->id,
            'postcode' => $this->faker->postcode(),
            'street' => $this->faker->streetAddress(),
            'number' => $this->faker->numberBetween(1, 100),
            'neighborhood' => $this->faker->word(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country()
        ];
    }
}
