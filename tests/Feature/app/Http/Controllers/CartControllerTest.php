<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Address;

class CartControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanNotAddUnavailableProductToCart()
    {
        // PREPARE
        $user = User::factory()->create();
        $product = Product::factory()->create(['quantity' => 0]);

        $payload = ['quantity' => 2];

        // ACT
        $this->actingAs($user);
        $this->post(route('cart.create', $product->id), $payload);

        // ASSERT
        $this->assertDatabaseCount(Order::class , 0);
        $this->assertDatabaseMissing(Order::class , [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'product_quantity' => 1,
            'status' => 'cart'
        ]);

        $this->assertDatabaseHas(Product::class , ['id' => $product->id, 'quantity' => 0]);
    }

    public function testUserCanAddAvailableProductToCart()
    {
        // PREPARE
        $user = User::factory()->create();
        Address::factory()->create();
        $product = Product::factory()->create(['quantity' => 1]);

        $payload = ['quantity' => 1];

        // ACT
        $this->actingAs($user);
        $this->post(route('cart.create', $product->id), $payload);

        // ASSERT
        $this->assertDatabaseCount(Order::class , 1);
        $this->assertDatabaseHas(Order::class , [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'product_quantity' => 1,
            'status' => 'cart'
        ]);

        $this->assertDatabaseHas(Product::class , ['id' => $product->id, 'quantity' => 0]);
    }

    public function testNormalUserCanNotDeleteOrders()
    {
        // PREPARE
        $rootUser = User::factory()->create();
        Product::factory()->create();
        Address::factory()->create();
        $order = Order::factory()->create(['status' => 'finished']);

        // ACT
        $this->actingAs($rootUser);
        $this->delete(route('carts.delete', $order->id));

        // ASSERT
        $this->assertDatabaseCount(Order::class , 1);
        $this->assertDatabaseHas(Order::class , $order->toArray());
    }

    public function testUserCanDeleteCartOrder()
    {
        // PREPARE
        $user = User::factory()->create();
        $product = Product::factory()->create(['quantity' => 0]);
        Address::factory()->create();
        $order = Order::factory()->create(['status' => 'cart', 'product_quantity' => 1]);

        // ACT
        $this->actingAs($user);
        $this->delete(route('carts.delete', $order->id));

        // ASSERT
        $this->assertDatabaseCount(Order::class , 0);
        $this->assertDatabaseMissing(Order::class , $order->toArray());

        $this->assertDatabaseHas(Product::class , ['id' => $product->id, 'quantity' => 1]);
    }

    public function testUserCanDecreaseCartQuantity()
    {
        // PREPARE
        $user = User::factory()->create();
        $product = Product::factory()->create(['quantity' => 0]);
        Address::factory()->create();
        $order = Order::factory()->create(['status' => 'cart', 'product_quantity' => 2]);

        // ACT
        $this->actingAs($user);
        $this->put(route('carts.quantity.update.less', $order->id));

        // ASSERT
        $this->assertDatabaseCount(Order::class , 1);
        $this->assertDatabaseHas(Order::class , ['id' => $order->id, 'product_quantity' => 1]);

        $this->assertDatabaseHas(Product::class , ['id' => $product->id, 'quantity' => 1]);
    }

    public function testUserCanIncreaseCartQuantity()
    {
        // PREPARE
        $user = User::factory()->create();
        $product = Product::factory()->create(['quantity' => 1]);
        Address::factory()->create();
        $order = Order::factory()->create(['status' => 'cart', 'product_quantity' => 1]);

        // ACT
        $this->actingAs($user);
        $this->put(route('carts.quantity.update.more', $order->id));

        // ASSERT
        $this->assertDatabaseCount(Order::class , 1);
        $this->assertDatabaseHas(Order::class , ['id' => $order->id, 'product_quantity' => 2]);

        $this->assertDatabaseHas(Product::class , ['id' => $product->id, 'quantity' => 0]);
    }
}
