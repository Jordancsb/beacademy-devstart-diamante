<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getNewProductPage()
    {
        return view("product.create");
    }

    public function postCreateNewProduct(Request $request)
    {
        $product = $request->all();
        dd($request);
    }
}
