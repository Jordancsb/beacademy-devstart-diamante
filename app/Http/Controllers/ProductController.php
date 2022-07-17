<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getNewProductPage()
    { 
       return view("product.create");
    }

    public function postCreateNewProduct(Request $req)
    {
        $data = $req->only('name', 'description', 'image_url', 'size', 'quantity', 'sale_price', 'cost_price');

        $this->model->create($data);

        return redirect()->route('product.new');
    }

    public function getStoreProduct(Request $request) {
        $products = $this->model->getProducts(
            $request->search ?? ''
        );
        return  view('product.store', compact('products'));
    }


    public function cartProducts(Request $request, $id){
            // add the products that were selected by ID in one array
    }

    public function details()
    {   
        $products = Product::all();
        return view('product.details')->with('products', $products);
    }

    public function edit($id)
    {   
        if (!$product = Product::find($id)) {
            return redirect()->route('product.details');
        }

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        if (!$product = $this->model->find($id)) {
            return redirect()->route('product.details');
        }

        $data = $request->all();

        $product->update($data);

        return redirect()->route('product.details');
    }

    public function delete($id)
    { 
        if (!$product = $this->model->find($id)) {
            return redirect()->route('product.details');
        }

        $product->delete();

        return redirect()->route('product.details');
    }
}
