<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getNewProductPage()
    {
        return view("product.create");
    }

    public function postNewProduct(Request $req)
    {
        $data = $req->only('name', 'description', 'image_url', 'size', 'quantity', 'sale_price', 'cost_price');

        if(!$this->product->create($data))
        {
            return redirect()->route('product.details')->with("error","Produto não cadastrado ");
        }
        return redirect()->route('product.details')->with("success","Produto Cadastrado com Sucesso!");
        
    }

    public function getStorePage(Request $request)
    {
        $products = $this->product->getProducts(
            $request->search ?? ''
        );
        return view('product.store', compact('products'));
    }


    public function postProductToCart(Request $request, $id)
    {
    // add the products that were selected by ID in one array
    }

    public function getAdminListPage()
    {
        $products = $this->product->all();
        return view('product.details')->with('products', $products);
    }

    public function getEditPage($id)
    {
        if (!$product = $this->product->find($id)) {
            return redirect()->route('product.details')->with("warning","Produto não encontrado.");
        }

        return view('product.edit', compact('product'));
    }

    public function putProduct(Request $request, $id)
    {
        if (!$product = $this->product->find($id)) {
            return redirect()->route('product.details')->with("warning","Produto não encontrado.");
        }
        $data = $request->all();

        if(!$product->update($data))
        {
            return redirect()->route('product.details')->with("error","Produto não atualizado.");
        }

        return redirect()->route('product.details')->with("info","Produto atualizado!");
    }

    public function deleteProduct($id)
    {
        if (!$product = $this->product->find($id)) {

            return redirect()->route('product.details')->with("warning","Produto não encontrado.");
        }

        if(!$product->delete())
        {
            return redirect()->route('product.details')->with("error","Produto não deletado.");
        }
        return redirect()->route('product.details')->with("warning","Produto deletado.");
    }
}
