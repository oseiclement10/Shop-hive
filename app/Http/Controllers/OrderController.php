<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function vendorOrders()
    {
        $orderItems = OrderItems::query()->whereIn("product_id", Auth::guard("vendor")->user()->products()->pluck("id"))->get();
        return view('vendor.orders', compact("orderItems"));
    }
}
