<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title("Products")]

class VendorProducts extends Component
{
    use WithPagination;

    public $headers;

    public bool $isModalOpen = false;

   

    public function mount()
    {
        $this->headers = [
            ["key" => "name", "label" => "Name"],
            ["key" => "category", "label" => "Category(s)"],
            ["key" => "stock.quantity", "label" => "Quantity"],
            ["key" => "stock.price", "label" => "Price"],
            ["key" => "rating", "label" => "User Ratings"],
        ];
    }


    public function render()
    {
        return view('livewire.vendor-products', [
            'products' => Product::vendorProducts()
                ->with(["stock", "categories", "reviews"])
                ->latest()->paginate(20),
        ]);
    }
}
