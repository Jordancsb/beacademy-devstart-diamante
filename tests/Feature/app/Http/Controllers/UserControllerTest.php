<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase
{
	use RefreshDatabase;
	/**
	 * A basic test example.
	 *
	 * @return void
	 */
	public function testInvalidUserCanNotLogin()
	{
		// PREPARE
		$payload = [
			'email' => 'invalid@email.com',
			'password' => 'password'
		];

		// ACT
		$response = $this->post(route('auth.login'), $payload);

		// ASSERT
		$response->assertStatus(303);
		$response->assertRedirect(route('login'));
	}

	public function testValidUserCanLogin()
	{
		// PREPARE
		$user = User::factory()->create();

		// ACT
		$response = $this->post(route('auth.login'), [
			'email' => $user->email,
			'password' => 'password'
		]);

		// ASSERT
		$response->assertStatus(302);
	}

	public function testInvalidUserCanNotSignUp()
	{
		// PREPARE
		$payload = [
			'first_name' => 1,
			'last_name' => 2,
			'email' => 'invalid email',
			'phone' => '00000',
			'cpf' => '00',
			'birth_date' => '0000-00-00 00:00',
			'cep' => '000',
			'address' => 'invalid address',
			'password' => ''
		];

		// ACT
		$this->post(route('users.create'), $payload);

		// ASSERT
		$this->assertDatabaseCount(User::class , 0);
		$this->assertDatabaseMissing(User::class , [
			'email' => $payload['email']
		]);
	}

	public function testValidUserCanSignUp()
	{
		// PREPARE
		$payload = User::factory()->definition();

		// ACT
		$response = $this->post(route('users.create'), $payload);

		// ASSERT
		$response->assertRedirect(route('login'));
		$this->assertDatabaseHas(User::class , [
			'email' => $payload['email'],
		]);
	}

	public function testNormalUserCanNotUpdateAnotherUsersInfos()
	{
		// PREPARE
		$rootUser = User::factory()->create();
		$user = User::factory()->create();

		$payload = $user->toArray();
		$payload['first_name'] = 'updated';
		$payload['last_name'] = 'updated';

		// ACT
		$this->actingAs($rootUser);
		$this->put(route('users.update', $user->id), $payload);

		// ASSERT
		$this->assertDatabaseHas(User::class , [
			'first_name' => $user->first_name,
			'last_name' => $user->last_name
		]);
		$this->assertDatabaseMissing(User::class , [
			'first_name' => $payload['first_name'],
			'last_name' => $payload['last_name']
		]);
	}

	public function testAdminUserCanUpdateAnotherUsersInfos()
	{
		// PREPARE
		$adminUser = User::factory()->create(['admin' => true]);
		$user = User::factory()->create();

		$payload = $user->toArray();
		$payload['first_name'] = 'updated';
		$payload['last_name'] = 'updated';

		// ACT
		$this->actingAs($adminUser);
		$this->put(route('users.update', $user->id), $payload);

		// ASSERT
		$this->assertDatabaseMissing(User::class , [
			'first_name' => $user->first_name,
			'last_name' => $user->last_name
		]);
		$this->assertDatabaseHas(User::class , [
			'first_name' => $payload['first_name'],
			'last_name' => $payload['last_name']
		]);
	}

	public function testNormalUserCanNotDeleteUsers()
	{
		// PREPARE
		$rootUser = User::factory()->create();

		$user = User::factory()->create();

		// ACT
		$this->actingAs($rootUser);
		$this->delete(route('users.delete', $user->id));

		// ASSERT
		$this->assertDatabaseCount(User::class , 2);
		$this->assertDatabaseHas(User::class , [
			'id' => $user->id
		]);
	}

	public function testAdminUserCanDeleteUsers()
	{
		// PREPARE
		$adminUser = User::factory()->create([
			'admin' => true
		]);

		$user = User::factory()->create();

		// ACT
		$this->actingAs($adminUser);
		$this->delete(route('users.delete', $user->id));

		// ASSERT
		$this->assertDatabaseCount(User::class , 1);
		$this->assertDatabaseMissing(User::class , [
			'id' => $user->id
		]);
	}
}
