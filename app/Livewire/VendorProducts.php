<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Auth;
use Livewire\WithPagination;

#[Title("Products")]

class VendorProducts extends Component
{
    use WithPagination;

    public $headers;

    public function mount()
    {
        $this->headers = [
            ["key" => "name", "label" => "Name"],
            ["key" => "category", "label" => "Category"],
            ["key" => "quantity", "label" => "Quantity"],
            ["key" => "price", "label" => "Price"],
            ["key" => "rating", "label" => "User Ratings"],
        ];
    }


    public function render()
    {
        return view('livewire.vendor-products', [
            'products' => Product::vendorProducts()
                ->with(["stocks", "categories", "reviews"])
                ->latest()->paginate(20),
        ]);
    }
}
