<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request){
        $query = $request->input('query');
        // dd($query);
        $products = Product::where('nombre','like',"%$query%")->paginate(6);

        return view('search.show')->with(compact('products','query'));
    }
}
