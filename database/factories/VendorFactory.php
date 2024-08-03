<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->words(2, true),
            "slug" => fake()->slug(),
            "description" => fake()->paragraph(),
            "logo" => "https://picsum.photos/id/" . fake()->numberBetween(1, 50) . "/200",
            "phone" => fake()->phoneNumber(),
            "address" => fake()->address(),
            "email" => fake()->email(),
            "password" => static::$password ??= Hash::make('vendorpassword'),
        ];
    }
}
