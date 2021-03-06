<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CartController extends Controller
{
    public function __construct(private Order $order, private Product $product)
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

        $product = $this->product->findOrFail($product_id);
        $newQuantity = $product->quantity - $req->quantity;

        if ($newQuantity < 0)
            return redirect()->back();

        $this->order->create($data);
        $product->update([
            'quantity' => $newQuantity
        ]);

        return redirect()->back();
    }

    public function deleteCartOrder($id)
    {
        $order = $this->order->findOrFail($id);

        if ($order->status != 'cart')
            return redirect()->back();

        $order->delete();

        $newQuantity = $order->product->quantity + $order->product_quantity;

        $order->product->update([
            'quantity' => $newQuantity,
        ]);

        return redirect()->back();
    }

    public function putCartQuantityLess($id)
    {
        $order = $this->order->findOrFail($id);

        if ($order->status != 'cart')
            return redirect()->back();

        $product = $order->product;

        $newOrderProductQuantity = $order->product_quantity - 1;
        $newProductQuantity = $product->quantity + 1;

        if ($newOrderProductQuantity == 0) {
            $order->delete();
            return redirect()->back();
        }
        else {
            $order->update([
                'product_quantity' => $newOrderProductQuantity,
            ]);
        }

        $product->update([
            'quantity' => $newProductQuantity,
        ]);

        return redirect()->back();
    }
    public function putCartQuantityMore($id)
    {
        $order = $this->order->findOrFail($id);

        if ($order->status != 'cart')
            return redirect()->back();

        $product = $order->product;

        $newOrderProductQuantity = $order->product_quantity + 1;
        $newProductQuantity = $product->quantity - 1;

        if ($product->quantity == 0)
            return redirect()->back();

        $order->update([
            'product_quantity' => $newOrderProductQuantity,
        ]);

        $product->update([
            'quantity' => $newProductQuantity,
        ]);

        return redirect()->back();
    }
}
