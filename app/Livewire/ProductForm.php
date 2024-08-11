<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use App\Models\Category;
use App\Models\Product;
use Auth;

class ProductForm extends Component
{
    use WithFileUploads;

    // #[Reactive]
    // public $mode = "create";

    #[Rule("required", message: "name is required")]
    public $name;

    #[Rule("required", message: "select at least one category")]
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


        $product->categories()->attach($this->category);
        $this->reset();
        $this->dispatch("productSaved");
    }


    public function render()
    {
        return view('livewire.product-form', [
            'categories' => Category::get()->push((object) ['id' => "0", "name" => "Other"]),
        ]);
    }
}
