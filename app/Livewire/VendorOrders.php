<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;

class VendorOrders extends Component
{

    public function render()
    {
        return view('livewire.vendor-orders', [
            "orderItems" => OrderItems::query()->whereIn("product_id", Auth::guard("vendor")->user()->products()->pluck("id"))->get()
        ]);
    }
}
