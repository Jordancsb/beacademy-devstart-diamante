<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Product;

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
			'user_id' => User::all()->random()->id,
			'product_id' => Product::all()->random()->id,
			'product_quantity' => $this->faker->numberBetween(1, 20),
			'status' => $this->faker->word(),
		];
	}
}
