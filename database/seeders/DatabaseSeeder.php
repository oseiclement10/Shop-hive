<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
        User::factory()->create([
            'firstname' => 'Test',
            'othernames' => 'User',
            'email' => 'admin@shophive.com',
        ]);

      
        // seed products, categories and stocks

        $categories = Category::factory()->count(10)->create();

        Product::factory()->count(10)->create()
            ->each(function ($product) use ($categories) {
                Stock::factory()->count(3)->create([
                    "product_id" => $product->id
                ]);
                $product->categories()->attach($categories->random(rand(1, 3))->pluck('id')->toArray());
            });

    }
}
