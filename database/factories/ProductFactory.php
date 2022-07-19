<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'name' => $this->faker->colorName(),
			'description' => $this->faker->text(),
			'image_url' => $this->faker->imageUrl(),
			'size' => $this->faker->numberBetween(30, 45),
			'quantity' => $this->faker->numberBetween(0, 100),
			'sale_price' => $this->faker->numberBetween(20, 200),
			'cost_price' => $this->faker->numberBetween(20, 200)
		];
	}
}
