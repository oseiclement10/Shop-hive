<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Support\Carbon;
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



    public function render()
    {
        $orderItems = Auth::guard('vendor')->user()->orderItems()->latest()->paginate(20);
        $cell_decoration = [
            'status' => [
                'text-emerald-600' => fn($orderItem) => $orderItem->status == "completed",
                'text-blue-600' => fn($orderItem) => $orderItem->status == "processing",
                'text-red-500' => fn($orderItem) => $orderItem->status == "cancelled",
            ],
        ];
        return view('livewire.vendor-orders', [
            "cell_decoration" => $cell_decoration,
            "orderItems" => $orderItems,
            "pendingOrders"=> Auth::guard('vendor')->user()->orderItems()->where('status', 'pending')->count(),
            "todayOrders" => Auth::guard('vendor')->user()->orderItems()
                ->where('status', 'completed')
                ->whereDate('order_items.updated_at', Carbon::today())
                ->count(),
        ]);
    }
}
