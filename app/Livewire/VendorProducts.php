<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Auth;

#[Title("Products")]

class VendorProducts extends Component
{
    use WithPagination; use WithFileUploads;

    public $headers;

    public bool $isModalOpen = false;

    public bool $customCategory = false;

    #[Rule("required", message: "name is required")]
    public $name;

    public $category = [];

    #[Rule("required", message: "Short description is required")]
    public $short_description;

    #[Rule("required", message: "Long description is required")]
    public $long_description;

    #[Rule("required", message: "image is required")]
    public $img;

    #[Rule("required", message: "price is required")]
    public $price;

    #[Rule("required", message: "quantity is required")]
    public $quantity;



    public function handleCategorySelect()
    {
        $this->customCategory = count($this->category) == 1 && $this->category[0] == "0";
        return;
    }

    public function save()
    {
        $this->validate();
        
        $imgPath = $this->img->store('products', 'public');

        $product = Product::create([
            "name" => $this->name,
            "img" => $imgPath,
            "vendor_id" => Auth::guard("vendor")->user()->id,
            "short_description" => $this->short_description,
            "long_description" => $this->long_description,
        ]);

        $product->stock()->create([
            "price" => $this->price,
            "quantity" => $this->quantity,
        ]);

        if ($this->customCategory) {
            $productCategory = Category::create([
                "name" => $this->category[0],
            ]);
            $product->categories()->attach($productCategory);
        } else {
            $product->categories()->attach($this->category);
        }

        $this->isModalOpen = false;
    }

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
            'categories' => Category::get()->push((object) ['id' => "0", "name" => "Other"]),
            'products' => Product::vendorProducts()
                ->with(["stock", "categories", "reviews"])
                ->latest()->paginate(20),
        ]);
    }
}
