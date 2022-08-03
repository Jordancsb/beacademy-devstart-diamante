<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		\App\Models\User::factory(10)->create();

		\App\Models\Product::factory(20)->create();

		\App\Models\Address::factory(10)->create();

		\App\Models\Order::factory(5)->create();

		\App\Models\User::factory()->create([
			'email' => 'admin@email.com',
			'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
			'admin' => true
		]);
	}
}
