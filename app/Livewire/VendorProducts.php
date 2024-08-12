<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;

use Livewire\Attributes\Title;
use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Category;


#[Title("Products")]

class VendorProducts extends Component
{
    use WithPagination;


    public ProductForm $form;

    public bool $isModalOpen = false;

    public bool $isEditMode = false;


    public function showAdd()
    {
        $this->form->reset();
        $this->reset();
        $this->isEditMode = false;
        $this->isModalOpen = true;
    }

    public function showEdit($id)
    {
        $product = Product::find($id);
        $this->form->setProduct($product);
        $this->isEditMode = true;
        $this->isModalOpen = true;
    }


    public function save()
    {
        if ($this->isEditMode) {
            $this->form->update();
            $this->isModalOpen = false;
        } else {
            $this->form->store();
            $this->isModalOpen = false;
        }
    }

    
    public function render()
    {
        $headers = [
            ["key" => "name", "label" => "Name"],
            ["key" => "category", "label" => "Category(s)"],
            ["key" => "stock.quantity", "label" => "Quantity"],
            ["key" => "stock.price", "label" => "Price"],
            ["key" => "rating", "label" => "User Ratings"],
        ];
        return view('livewire.vendor-products', [
            'categories' => Category::get()->push((object) ['id' => "0", "name" => "Other"]),
            'headers' => $headers,
            'products' => Product::vendorProducts()
                ->with(["stock", "categories", "reviews"])
                ->latest()->paginate(20),
        ]);
    }
}
