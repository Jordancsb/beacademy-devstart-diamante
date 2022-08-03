<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

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

        if ($product->quantity == 0)
            return redirect()->back();

        $newOrderProductQuantity = $order->product_quantity + 1;
        $newProductQuantity = $product->quantity - 1;

        $order->update([
            'product_quantity' => $newOrderProductQuantity,
        ]);

        $product->update([
            'quantity' => $newProductQuantity,
        ]);

        return redirect()->back();
    }

    public function putCheckoutCart(Request $req)
    {
        $user = Auth::user();

        $data = $req->only('transaction_type', 'transaction_installments', 'customer_card_number', 'customer_card_cvv');
        $data['customer_card_expiration_date'] = Carbon::createFromFormat('m/Y', $req->customer_card_expiration_date)->format('m/Y');

        $data['customer_name'] = $user->full_name;
        $data['customer_document'] = $user->cpf;

        dd($data);

        $orders = $user->orders()->where('status', 'cart')->get();
        $amount = 0;

        foreach ($orders as $order) {
            $amount += ($order->product->sale_price * $order->product_quantity);
        }

        $data['transaction_amount'] = $amount;

        $response = Http::withoutVerifying()->withHeaders([
            'Content-Type' => 'application/json',
            'token' => 'UGFyYWLDqW5zLCB2b2PDqiBlc3RhIGluZG8gYmVtIQ=='
        ])->post('https://tracktools.vercel.app/api/checkout', $data)->json();

        if ($response['response']['code'] != 201)
            return redirect(route('product.store'));

        $this->order->where('status', 'cart')->update([
            'transaction_id' => $response['transaction']['id'],
            'status' => $response['transaction']['status']
        ]);

        Mail::send('mail.order.checkout', ['orders' => $orders, 'amount' => $amount, 'transactionId' => $response['transaction']['id']], function ($mail) use ($user) {
            $mail->to($user->email);
            $mail->priority(1);
            $mail->subject("Seu pedido está em processamento, {$user->first_name}.");
        });

        return redirect(route('product.store'));
    }
}
