<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function vendorOrders()
    {
        $orderItems = OrderItems::query()->whereIn("product_id", Auth::guard("vendor")->user()->products()->pluck("id"));
        return view('vendor.orders', ["orderItems" => $orderItems]);
    }
}
