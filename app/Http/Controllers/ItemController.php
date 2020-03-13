<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request){

        $reglas = [
            "unidades" => "integer"
        ];

        $mensajes = [
            "integer" => "El campo :attribute debe ser un numero entero"
        ];

        $this->validate($request, $reglas, $mensajes);

        $item = new Item();
        $item->order_id = auth()->user()->order->id;
        $item->product_id = $request->product_id;
        $item->unidades = $request->input('unidades');

        $item->save();
        
        return redirect(url('/'));
    }

    public function destroy(Request $request){
        $item = Item::find($request->item_id);

        $item->delete();
        
        return back();
    }
}
