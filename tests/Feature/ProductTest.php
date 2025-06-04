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
        ->assertStatus(200)
        ->assertSee($product->name);
});
