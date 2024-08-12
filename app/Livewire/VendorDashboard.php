<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Dashboard')]

class VendorDashboard extends Component
{
    public function render()
    {
        $headers = [
            ["key" => "name", "label" => "Name"],
            ["key" => "category", "label" => "Category(s)"],
            ["key" => "stock.quantity", "label" => "Quantity"],
            ["key" => "stock.price", "label" => "Price"],
            ["key" => "rating", "label" => "User Ratings"],
        ];

        return view('livewire.vendor-dashboard', [
            "headers" => $headers,
            "products" => Product::vendorProducts()->with(["stock", "categories", "reviews"])->latest()->take(5)->get(),
        ]);
    }
}
