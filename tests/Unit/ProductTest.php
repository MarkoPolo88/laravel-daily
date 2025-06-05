<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\User;
use App\Services\ProductService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Brick\Math\Exception\NumberFormatException;
class ProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_contains_table_product(): void
    {
        $user = User::factory()->create();

        $product = Product::create([
            'name'  => 'table',
            'price' => 100,
        ]);

        $response = $this->actingAs($user)->get('/products');

        $response->assertStatus(200);
        $response->assertSeeText('table');
    }

    public function test_homepage_contains_products_in_order(): void
    {
        $user = User::factory()->create();

        [$product1, $product2] = Product::factory(2)->create();

        $response = $this->actingAs($user)->get('/products');

        $response->assertStatus(200);
        $response->assertSeeInOrder([$product1->name, $product2->name]);
    }

    public function test_product_service_create_returns_product(): void
    {
        $product = (new ProductService())->create('Test product', 1234);

        $this->assertInstanceOf(Product::class, $product);
    }

    public function test_product_service_create_validation(): void
    {
        try {
            $product = (new ProductService())->create('Test product', 1234567);
        } catch (\Exception $e) {
            $this->assertInstanceOf(NumberFormatException::class, $e);
        }
    }
}