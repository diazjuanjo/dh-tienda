<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {    
         $orders = auth()->user()->orders;
        return view('pedido')->with(compact('orders'));
    }
    public function show($id){
        $items = Item::where('order_id',$id)->get();
        return view('order.show')->with(compact('items'));
    }
    public function update(Request $req){
        $order = auth()->user()->order;
        $order->estado = 'pedido';
        $order->costo = $req->costo;
        $order->save();
        return redirect(url('/order'));
    }
    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete(); // delete

        return redirect('/admin/orders');
    }
}
