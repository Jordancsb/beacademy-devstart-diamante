<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class CartController extends Controller
{
    public function __construct(User $user, Product $product, Order $order)
    {
        $this->user = $user;
        $this->product = $product;
        $this->order = $order;
    }

    public function index()
    {
        $orders = Order::where([
            'status' => 'RE',
            'client_id' => Auth::id()
        ])->orderBy('product_id', 'desc')->paginate(10);

        
        $select = "sum(products.sale_price*orders.product_quantity)as total";

        $purchases = DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where([
            'status' => 'RE',
            'client_id' => Auth::id()
        ])->select(DB::raw($select))->get();

        $purchases = str_replace( array( '\'', '"', ',' , ';', '<', '>' , '[', ']', '{', '}', ':', 'total'), ' ', $purchases);

        return view('cart.index', compact('orders', 'purchases'));
    }

    public function add($id)
    {
        if(!$product = Product::find($id)) {
            return redirect()->route('/');
        }

        $checkIdProduct = CartController::checkUniqueIdProduct($id);

        if($checkIdProduct >= 1) {
            return CartController::addQuantity($checkIdProduct);
        }
        
        $user = Auth::id();   

        Order::create([
            'client_id' => $user,
            'product_id' => $id,
            'status' => 'RE',
            'product_quantity' => 1
        ]);

        return redirect()->route('product.store')->with('add', 'Produto adicionado com sucesso!');
    }

    public function destroy($id)
    {
        if(!$order = Order::find($id))
            return redirect()->route('products.store');

        $order->delete();

        return redirect()->route('cart.index')->with('destroy', 'Produto removido com sucesso!');;
    }

    public function addQuantity($id)
    {
        if(!$order = Order::find($id))
            return redirect()->route('product.store');
        
        $quantity = $order->product_quantity;
        $quantity++;

        $order->update([
            'product_quantity' => $quantity
        ]);

        return redirect()->route('cart.index')->with('update', 'Quantidade atualizada com sucesso!');;

    }

    public function removeQuantity($id)
    {
        if(!$order = Order::find($id))
            return redirect()->route('product.store');
        
        $quantity = $order->product_quantity;

        if($quantity == 1) {
            return  CartController::destroy($id);
        }

        $quantity--;

        $order->update([
            'product_quantity' => $quantity
        ]);

        return redirect()->route('cart.index')->with('update', 'Quantidade atualizada com sucesso!');;

    }

    public function checkUniqueIdProduct ($id)
    {
        $orders = Order::where([
            'status' => 'RE',
            'client_id' => Auth::id()
        ])->get();
        
        foreach($orders as $order) {
            if($order->product_id == $id){
                return $order->id;
            }
        }
        return $order = 0;

    }
}
