<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id' => $this->faker->numberBetween(1, 10),
            'product_id' => $this->faker->numberBetween(1, 20),
            'product_quantity' => $this->faker->numberBetween(1, 20),
            'status' => $this->faker->word(),
        ];
    }
}
