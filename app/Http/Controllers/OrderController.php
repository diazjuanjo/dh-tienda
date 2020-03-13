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
    public function update(){
        $order = auth()->user()->order;
        $order->estado = 'pedido';
        $order->save();
        return redirect(url('/order'));
    }
}
