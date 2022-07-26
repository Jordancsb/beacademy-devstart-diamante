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

    public function getViewPage($id)
    {
        $order = $this->order->findOrFail($id);

        return view('order.view', compact('order'));
    }

    public function deleteOrder($id)
    {
    // Deleta o pedido.

    // Envia um email comunicando a deleção do pedido.

    // Redireciona o usuário.
    }
}
