<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNormalUserCanNotCreateANewProduct()
    {
        // PREPARE
        $rootUser = User::factory()->create();
        $payload = Product::factory()->definition();

        // ACT
        $this->actingAs($rootUser);
        $this->post(route('products.create'), $payload);

        // ASSERT
        $this->assertDatabaseCount(Product::class , 0);
        $this->assertDatabaseMissing(Product::class , $payload);
    }

    public function testAdminUserCanCreateANewProduct()
    {
        // PREPARE
        $adminUser = User::factory()->create(['admin' => true]);
        $payload = Product::factory()->definition();


        // ACT
        $this->actingAs($adminUser);
        $this->post(route('products.create'), $payload);

        // ASSERT
        $this->assertDatabaseCount(Product::class , 1);
        $this->assertDatabaseHas(Product::class , $payload);
    }

    public function testNormalUserCanNotUpdateAProduct()
    {
        // PREPARE
        $rootUser = User::factory()->create();
        $product = Product::factory()->create();

        $payload = $product->toArray();
        $payload['name'] = 'updated';

        // ACT
        $this->actingAs($rootUser);
        $this->put(route('products.update', $product->id), $payload);

        // ASSERT
        $this->assertDatabaseCount(Product::class , 1);
        $this->assertDatabaseHas(Product::class , ['name' => $product->name]);
        $this->assertDatabaseMissing(Product::class , ['name' => $payload['name']]);
    }

    public function testAdminUserCanUpdateAProduct()
    {
        // PREPARE
        $adminUser = User::factory()->create(['admin' => true]);
        $product = Product::factory()->create();

        $payload = $product->toArray();
        $payload['name'] = 'updated';

        // ACT
        $this->actingAs($adminUser);
        $this->put(route('products.update', $product->id), $payload);

        // ASSERT
        $this->assertDatabaseCount(Product::class , 1);
        $this->assertDatabaseMissing(Product::class , ['name' => $product->name]);
        $this->assertDatabaseHas(Product::class , ['name' => $payload['name']]);
    }

    public function testNormalUserCanNotDeleteAProduct()
    {
        // PREPARE
        $rootUser = User::factory()->create();
        $product = Product::factory()->create();

        // ACT
        $this->actingAs($rootUser);
        $this->delete(route('products.delete', $product->id));

        // ASSERT
        $this->assertDatabaseCount(Product::class , 1);
        $this->assertDatabaseHas(Product::class , $product->toArray());
    }

    public function testAdminUserCanDeleteAProduct()
    {
        // PREPARE
        $adminUser = User::factory()->create(['admin' => true]);
        $product = Product::factory()->create();

        // ACT
        $this->actingAs($adminUser);
        $this->delete(route('products.delete', $product->id));

        // ASSERT
        $this->assertDatabaseCount(Product::class , 0);
        $this->assertDatabaseMissing(Product::class , $product->toArray());
    }
}
