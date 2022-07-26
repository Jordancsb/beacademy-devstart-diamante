<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct(private Order $order)
    {
    }

    public function getAdminListPage()
    {
        $orders = $this->order->all();

        return view('order.details', compact('orders'));
    }
}
