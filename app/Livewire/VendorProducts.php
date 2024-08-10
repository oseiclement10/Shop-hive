<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Auth;

#[Title("Products")]

class VendorProducts extends Component
{
    public function render()
    {
        return view('livewire.vendor-products', [
            'products' =>  Auth::guard("vendor")->user()->products()->latest()->get(),
        ]);
    }
}
