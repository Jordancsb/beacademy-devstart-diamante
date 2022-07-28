<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Mail;

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
        $order = $this->order->findOrFail($id);

        $productName = $order->product->name;

        $order->delete();

        $newQuantity = $order->product->quantity + $order->product_quantity;

        $order->product->update([
            'quantity' => $newQuantity,
        ]);

        // Envia um email comunicando a deleção do pedido.
        Mail::send('mail.order.deleted', ['productName' => $productName], function ($mail) use ($order) {
            $mail->to($order->user->email);
            $mail->priority(1);
            $mail->subject('Seu Pedido foi cancelado!');
        });

        return redirect()->route('order.details');
    }
}
