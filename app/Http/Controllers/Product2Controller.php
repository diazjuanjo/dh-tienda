<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class Product2Controller extends Controller
{
    public function show($id){
        // return "Mostrar datos de $id";
        $product = Product::find($id);
        return view('show')->with(compact('product'));
    }
}
