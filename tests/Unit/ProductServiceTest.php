<?php

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('returns product from the product service create method', function () {
    $product = (new ProductService())->create('Test product', 1234);

    expect($product)->toBeInstanceOf(Product::class);
});
