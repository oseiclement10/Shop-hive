<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use App\Models\Category;
use App\Models\Product;
use Auth;


class ProductForm extends Form
{
    use WithFileUploads;
            
    public ?Product $product;

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

    public function store()
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
    }

    public function setProduct(Product $product)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->category = $product->categories->pluck('id')->toArray();
        $this->short_description = $product->short_description;
        $this->long_description = $product->long_description;
        $this->img = $product->img;
        $this->price = $product->stock->price;
        $this->quantity = $product->stock->quantity;
    }

    public function update()
    {
        $this->validate();
        $this->product->update([
            "name" => $this->name,
            "short_description" => $this->short_description,
            "long_description" => $this->long_description,
            "img" => $this->img,
        ]);
        $this->product->stock()->updateOrCreate(
            ["product_id" => $this->product->id],
            [
                "price" => $this->price,
                "quantity" => $this->quantity,
            ]
        );
        $this->product->categories()->sync($this->category);
        $this->reset();
    }

}
