<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function update(){
        $order = auth()->user()->order;
        $order->estado = 'pendiente';
        $order->save();
        return back();
    }
}
