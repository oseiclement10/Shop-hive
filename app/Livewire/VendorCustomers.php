<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Customers')]

class VendorCustomers extends Component
{
    public function render()
    {
        return view('livewire.vendor-customers');
    }
}
