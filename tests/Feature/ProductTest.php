<?php

use App\Models\User;
use App\Models\Product;
use function Pest\Laravel\actingAs;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    $this->user = User::factory()->create();
});

test('homepage contains table product', function () {
    $product = Product::create([
        'name'  => 'table',
        'price' => 100,
    ]);

    actingAs($this->user)
        ->get('/products')
        ->assertOk()
        ->assertSeeText($product->name);
});

test('homepage contains products in order', function () {
    [$product1, $product2] = Product::factory(2)->create();

    actingAs($this->user)
        ->get('/products')
        ->assertOk()
        ->assertSeeInOrder([$product1->name, $product2->name]);
});

test('guest cannot access products page', function () {
    actingAs($this->user)
        ->get('/products/create')
        ->assertForbidden();
});
