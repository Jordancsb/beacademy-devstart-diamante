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
		$images = [
			'https://static.prospin.com.br/media/catalog/product/cache/6e59e4946046b080cb91aa3230980e44/w/r/wrb00809-tenis-wilson-open-masc-branco-preto-e-azul_1.jpg',
			'https://cf.shopee.com.br/file/36c1768172bb2a3d8cef263b663d35ac_tn',
			'https://sapatinhodeluxo.vteximg.com.br/arquivos/ids/177446-620-620/8020.01_1-Tenis-Lona-Preto-Vulcanizado-Flat-0.jpg?v=637756853198930000',
			'https://60398.cdn.simplo7.net/static/60398/sku/masculino-tenis-qix-80-s-1617126891949.jpg',
			'https://imgcentauro-a.akamaihd.net/230x230/973605C4.jpg',
			'https://static.zattini.com.br/produtos/tenis-adidas-runfalcon-20-feminino/06/NQQ-6922-006/NQQ-6922-006_zoom1.jpg?ts=1612439270&ims=544x'
		];

		return [
			'name' => $this->faker->colorName(),
			'description' => $this->faker->text(),
			'image_url' => $this->faker->randomElement($images),
			'size' => $this->faker->numberBetween(30, 45),
			'quantity' => $this->faker->numberBetween(0, 100),
			'sale_price' => $this->faker->numberBetween(20, 200),
			'cost_price' => $this->faker->numberBetween(20, 200)
		];
	}
}
