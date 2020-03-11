<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class Category2Controller extends Controller
{
    public function show($id){
        $category = Category::find($id);
        $products = $category->products()->paginate(6);
        return view('categories.show')->with(compact('category','products'));
    }
}
