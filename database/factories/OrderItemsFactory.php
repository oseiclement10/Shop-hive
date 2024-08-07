<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItems>
 */
class OrderItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "order_id" => Order::factory(),
            "product_id" => Product::factory(),
            "quantity" => fake()->numberBetween(1, 5),
            "price" => fake()->randomFloat(2, 10, 1000),
            "total" => fake()->randomFloat(2, 10, 1000),
            "status" => fake()->randomElement(["pending", "processing", "completed", "cancelled"]),
        ];
    }
}
