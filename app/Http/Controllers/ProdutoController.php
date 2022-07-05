<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function cadastro()
    {
        return view("pages.cadastro");
    }

    
    public function cadastroProduto(Request $request){
        $produto = $request->all();
        dd($request);
    }
}
