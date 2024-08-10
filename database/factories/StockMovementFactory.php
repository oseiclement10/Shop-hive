<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Stock;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockMovement>
 */
class StockMovementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $movementType = fake()->randomElement(["in", "out"]);
        return [
            "stock_id" => Stock::factory(),
            "quantity" => fake()->numberBetween(10, 200),
            "price" => fake()->randomFloat(2, 10, 1000),
            "type" => $movementType,
            "description" => $movementType == "in" ? "Stock In" : "Stock Out",
        ];
    }
}
