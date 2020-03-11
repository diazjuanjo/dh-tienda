<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(8);
        return view('admin.products.index')->with(compact('products'));
    }
    public function create()
    {
        $categories = Category::orderBy('nombre')->get();
        return view('admin.products.create')->with(compact('categories'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $reglas = [
            "category_id" => "integer",
            "nombre" => "string|max:255",
            "descripcion" => "string|max:255",
            "precio" => "numeric",
            "stock" => "integer",
            "imagen" => "file" 
        ];

        $mensajes = [
            "string" => "El campo :attribute debe ser un texto",
            "max" => "El campo :attribute tiene un maximo de :max",
            "numeric" => "El campo :attribute debe ser un numero",
            "integer" => "El campo :attribute debe ser un numero entero",
            "file" => "El campo :attribute debe ser una imagen"
        ];

        $this->validate($request, $reglas, $mensajes);

        $product = new Product();

        $ruta = request()->file('imagen')->store('public');
        $nombreArchivo = basename($ruta);

        $product->category_id = $request->category_id;
        $product->nombre = $request->input('nombre');
        $product->descripcion = $request->input('descripcion');
        $product->precio = $request->input('precio');
        $product->stock = $request->input('stock');
        $product->imagen = $nombreArchivo;

        $product->save();

        return redirect('/admin/products');
    }
    public function edit($id)
    {
        // return "Mostrar id = $id";
        $categories = Category::orderBy('nombre')->get();
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product', 'categories'));
    }
    public function update(Request $request, $id){

        $reglas = [
            "category_id" => "integer",
            "nombre" => "string|max:255",
            "descripcion" => "string|max:255",
            "precio" => "numeric",
            "stock" => "integer",
            "imagen" => "file" 
        ];

        $mensajes = [
            "string" => "El campo :attribute debe ser un texto",
            "max" => "El campo :attribute tiene un maximo de :max",
            "numeric" => "El campo :attribute debe ser un numero",
            "integer" => "El campo :attribute debe ser un numero entero",
            "file" => "El campo :attribute debe ser una imagen"
        ];

        $this->validate($request, $reglas, $mensajes);

        $product = Product::find($id);

        $product->category_id = $request->category_id;
        $product->nombre = $request->input('nombre');
        $product->descripcion = $request->input('descripcion');
        $product->precio = $request->input('precio');
        $product->stock = $request->input('stock');
        if (request()->file('imagen')) {
            $ruta = request()->file('imagen')->store('public');
            $nombreArchivo = basename($ruta);
            $product->imagen = $nombreArchivo;
        }

        $product->save();

        return redirect('/admin/products');
    }
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete(); // delete

        return redirect('/admin/products');
    }
}
