<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Address;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNormalUserCanNotDeleteAnOrder()
    {
        // PREPARE
        $rootUser = User::factory()->create();
        Product::factory()->create();
        Address::factory()->create();
        $order = Order::factory()->create();

        // ACT
        $this->actingAs($rootUser);
        $this->delete(route('orders.delete', $order->id));

        // ASSERT
        $this->assertDatabaseCount(Order::class , 1);
        $this->assertDatabaseHas(Order::class , $order->toArray());
    }

    public function testAdminUserCanDeleteAnOrder()
    {
        // PREPARE
        $adminUser = User::factory()->create(['admin' => true]);
        Product::factory()->create();
        Address::factory()->create();
        $order = Order::factory()->create();

        // ACT
        $this->actingAs($adminUser);
        $this->delete(route('orders.delete', $order->id));

        // ASSERT
        $this->assertDatabaseCount(Order::class , 0);
        $this->assertDatabaseMissing(Order::class , $order->toArray());
    }
}
