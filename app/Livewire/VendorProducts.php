<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;

class VendorProducts extends Component
{
    public function render()
    {
        return view('livewire.vendor-products', [
            'products' =>  Auth::guard("vendor")->user()->products()->latest()->get(),
        ]);
    }
}
