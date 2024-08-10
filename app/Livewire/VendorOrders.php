<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

#[Title("Orders")]

class VendorOrders extends Component
{
   
    use WithPagination;
    public $headers;

 
    public function mount()
    {
        $this->headers = [
            ["key" => "id", "label" => "# Order ID", "class" => "w-1"],
            ["key" => "product.name", "label" => "Product"],
            ["key" => "quantity", "label" => "Quantity"],
            ["key" => "price", "label" => "Price"],
            ["key" => "total", "label" => "Total"],
            ["key" => "status", "label" => "Status"],
        ];
    }

    public function orderItems()
    {
        return OrderItems::query()->with("product")->whereIn("product_id", Auth::guard("vendor")->user()->products()->pluck("id"))->paginate(20);
    }

    public function render()
    {
        return view('livewire.vendor-orders', [
            "cell_decoration" => [
                'status' => [
                    'text-emerald-600' => fn($orderItem) => $orderItem->status == "completed",
                    'text-blue-600' => fn($orderItem) => $orderItem->status == "processing",
                    'text-red-500' => fn($orderItem) => $orderItem->status == "cancelled",
                ],
            ],
            "orderItems" => $this->orderItems(),
        ]);
    }
}
