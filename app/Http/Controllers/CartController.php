<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct(private Order $order)
    {
    }

    public function getIndexPage()
    {
        $cart = Auth::user()->orders()->where('status', 'cart')->get();

        return view('cart.index', compact('cart'));
    }

    public function postProductToCart(Request $req, $product_id)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'product_id' => $product_id,
            'product_quantity' => $req->quantity,
            'status' => 'cart'
        ];

        $order = $this->order->create($data);

        $newQuantity = $order->product->quantity - $req->quantity;

        $order->product->update([
            'quantity' => $newQuantity
        ]);

        return redirect()->back();
    }
}
