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
        return [
            "name" => fake()->word(),
            "img" => "https://picsum.photos/id/".fake()->numberBetween(1,50)."/200/300",
            "short_description" => fake()->sentence(),
            "description" => fake()->paragraph(),
            "slug" => fake()->slug(),
        ];
    }
}
