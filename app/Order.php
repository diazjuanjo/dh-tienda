<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function products(){
        return $this->belongsToMany('App\Product','items','order_id','product_id');
    }
    public function items(){
        return $this->hasMany('App\Item','order_id');
    }
    public function show($id){
        $item = new Item();
        $item = $this->items()->where('product_id',$id)->first();

        return $item;
    }
}
