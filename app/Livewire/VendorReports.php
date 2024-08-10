<?php

namespace App\Livewire;
use Livewire\Attributes\Title;

use Livewire\Component;

#[Title('Reports')]

class VendorReports extends Component
{
    public function render()
    {
        return view('livewire.vendor-reports');
    }
}
