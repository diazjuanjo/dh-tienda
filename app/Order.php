<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;

class Order extends Model
{
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function products(){
        return $this->belongsToMany('App\Product','items','order_id','product_id');
    }
    public function items(){
        return $this->hasMany('App\Item','order_id');
    }
}
