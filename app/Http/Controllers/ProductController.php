<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Product;

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
}
