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

        $addresses = Auth::user()->addresses()->get();

        return view('cart.index', compact('cart', 'addresses'));
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
        		
		if ($cartOrder = Auth::user()->orders()->where('status', 'cart')->where('product_id', $product_id)->first()) {
			$cartOrder->update([
				'product_quantity' => (int)$cartOrder->product_quantity + (int)$req->quantity
			]);
		} else {
			$this->order->create($data);
		}
        
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

        $address = $user->addresses()->findOrFail($req->address_id);
        
        $data = match($req->transaction_type) {
            'ticket' => (function () use ($address) {
                $data = [
                    'customer_postcode' => $address->postcode,
                    'customer_address_street' => $address->street,
                    'customer_address_number' => $address->number,
                    'customer_address_neighborhood' => $address->neighborhood,
                    'customer_address_city' => $address->city,
                    'customer_address_country' => $address->country,
                    'transaction_type' => 'ticket'
                ];

                return $data;
            })(),
            'card' => (function () use ($req) {
                $data = $req->only('transaction_installments', 'customer_card_number', 'customer_card_cvv');
                $data['customer_card_expiration_date'] = Carbon::createFromFormat('m/Y', $req->customer_card_expiration_date)->format('m/Y');
                $data['transaction_type'] = 'card';

                return $data;
            })()
        };

        $data['customer_name'] = $user->full_name;
        $data['customer_document'] = $user->cpf;

        $orders = $user->orders()->where('status', 'cart')->get();
        $amount = 0;

        foreach ($orders as $order) {
            $amount += ($order->product->sale_price * $order->product_quantity);
        }

        $data['transaction_amount'] = $amount;

        $response = Http::withoutVerifying()
        ->withHeaders([
            'Content-Type' => 'application/json',
            'token' => 'UGFyYWLDqW5zLCB2b2PDqiBlc3RhIGluZG8gYmVtIQ=='
        ])
        ->post('https://tracktools.vercel.app/api/checkout', $data)
        ->json();

        if ($response['response']['code'] != 201)
            return redirect(route('product.store'));

        $user->orders()->where('status', 'cart')->update([
            'transaction_id' => $response['transaction']['id'],
            'address_id' => $address->id,
            'status' => $response['transaction']['status']
        ]);

        Mail::send('mail.order.checkout', ['orders' => $orders, 'amount' => $amount, 'transactionId' => $response['transaction']['id'], 'type' => $data['transaction_type']], function ($mail) use ($user) {
            $mail->to($user->email);
            $mail->priority(1);
            $mail->subject("Seu pedido está em processamento, {$user->first_name}.");
        });

        return redirect(route('product.store'));
    }
}
