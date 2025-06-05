<?php

namespace App\Services;

use App\Models\Product;
use Brick\Math\Exception\NumberFormatException;

class ProductService
{
    public function create(string $name, int $price): Product
    {
        if ($price > 1_000_000) {
            throw new NumberFormatException('Price too big');
        }

        return Product::create([
            'name' => $name,
            'price' => $price,
        ]);
    }
}
