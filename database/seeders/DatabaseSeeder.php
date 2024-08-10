<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Stock;
use App\Models\StockMovement;
use App\Models\User;
use App\Models\Order;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $mainUser = User::factory()->create([
            'firstname' => 'Test',
            'othernames' => 'User',
            'email' => 'user@shophive.com',
            "email_verified_at" => now(),
        ]);

        $mainVendor = Vendor::factory()->create([
            'name' => 'Shophive Limited',
            'email' => 'vendor@shophive.com',
            "email_verified_at" => now(),
        ]);



        $categories = Category::factory()->count(10)->create();

        Product::factory()->count(10)->state(
            new Sequence(
                ["vendor_id" => $mainVendor->id,],
                ["vendor_id" => Vendor::factory()->create()->id]
            )
        )->create()
            ->each(function ($product) use ($categories, $mainUser) {

                Order::factory()->count(3)->state(
                    new Sequence(
                        [
                            "customer_id" => $mainUser->id
                        ],
                        ["customer_id" => User::factory()->create()->id]
                    )
                )->create()->each(function ($order) use ($product) {
                    OrderItems::factory()->count(3)->create([
                        "order_id" => $order->id,
                        "product_id" => $product->id,
                    ]);
                });

                $stock = Stock::factory()->create([
                    "product_id" => $product->id
                ]);

                StockMovement::factory()->count(2)->create([
                    "stock_id" => $stock->id
                ]);

            

                ProductReview::factory()->count(3)->create([
                    "product_id" => $product->id,
                ]);
                $product->categories()->attach($categories->random(rand(1, 3))->pluck('id')->toArray());
            });

    }
}
