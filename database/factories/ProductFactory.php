<?php

namespace Database\Factories;

use App\Models\Vendor;
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
            "name" => fake()->words(3, true),
            "img" => "https://picsum.photos/id/" . fake()->numberBetween(1, 50) . "/400/250",
            "short_description" => fake()->sentence(),
            "long_description" => fake()->paragraph(),
            "slug" => fake()->slug(),
            "vendor_id" => Vendor::factory(),
        ];
    }
}
