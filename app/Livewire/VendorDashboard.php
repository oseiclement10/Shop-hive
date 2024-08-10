<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Dashboard')]

class VendorDashboard extends Component
{
    public function render()
    {
        return view('livewire.vendor-dashboard');
    }
}
