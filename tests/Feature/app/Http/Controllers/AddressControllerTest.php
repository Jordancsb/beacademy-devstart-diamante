<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Address;

class AddressControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanUnlinkAnAddressToHisAccount()
    {
        // PREPARE
        $user = User::factory()->create();
        $address = Address::factory()->create(['user_id' => $user->id]);

        // ACT
        $this->actingAs($user);
        $this->delete(route('addresses.delete', $address->id));

        // ASSERT
        $this->assertDatabaseCount(Address::class , 1);
        $this->assertDatabaseHas(Address::class , [
            'user_id' => null
        ]);
        $this->assertDatabaseMissing(Address::class , [
            'user_id' => $user->id
        ]);
    }

    public function testUserCanCreateANewAddress()
    {
        // PREPARE
        $user = User::factory()->create();
        $payload = Address::factory()->definition();
        $payload['postcode'] = '00000000';

        // ACT
        $this->actingAs($user);
        $this->post(route('addresses.create'), $payload);

        // ASSERT
        $this->assertDatabaseCount(Address::class , 1);
        $this->assertDatabaseHas(Address::class , $payload);
    }

    public function testUserCanEditAddress()
    {
        // PREPARE
        $user = User::factory()->create();
        $address = Address::factory()->create();
        $payload = Address::factory()->definition();
        $payload['postcode'] = '00000000';

        // ACT
        $this->actingAs($user);
        $this->put(route('addresses.update', $address->id), $payload);

        // ASSERT
        $this->assertDatabaseCount(Address::class , 1);
        $this->assertDatabaseHas(Address::class , $payload);
        $this->assertDatabaseMissing(Address::class , $address->toArray());
    }
}
