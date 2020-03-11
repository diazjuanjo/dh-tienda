<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(8);
        return view('admin.categories.index')->with(compact('categories'));
    }
    public function create(){
        return view('admin.categories.create');
    }
    public function store(Request $request){
        // dd($request->all());
        // Validaciones 

        $reglas = [
            "nombre" => "string|max:255"
        ];

        $mensajes = [
            "string" => "El campo :attribute debe ser un texto",
            "max" => "El campo :attribute tiene un maximo de :max"
        ];

        $this->validate($request, $reglas, $mensajes);

        $category = new Category();

        $category->nombre = $request->input('nombre');

        $category->save();

        return redirect('/admin/categories');
    }
    public function edit($id){
        // return "Mostrar id = $id";
        $category = Category::find($id);
        return view('admin.categories.edit')->with(compact('category'));
    }
    public function update(Request $request, $id){

        $reglas = [
            "nombre" => "required|max:255"
        ];

        $mensajes = [
            "required" => "El campo :attribute es obligatorio",
            "max" => "El campo :attribute tiene un maximo de :max"
        ];

        $this->validate($request, $reglas, $mensajes);

        $category = Category::find($id);

        $category->nombre = $request->input('nombre');

        $category->save();

        return redirect('/admin/categories');
    }
    public function destroy($id){
        $category = Category::find($id);
        $category->delete(); // delete

        return redirect('/admin/categories');
    }
}
