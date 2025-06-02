<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Electronics', 'Clothing', 'Books', 'Home & Garden', 'Sports', 'Toys'];

        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraphs(2, true),
            'price' => fake()->randomFloat(2, 10, 1000),
            'stock' => fake()->numberBetween(0, 100),
            'sku' => fake()->unique()->regexify('[A-Z]{2}[0-9]{6}'),
            'is_active' => fake()->boolean(80), // 80% chance of being active
            'category' => fake()->randomElement($categories),
        ];
    }
}
