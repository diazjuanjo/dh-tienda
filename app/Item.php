<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function order(){
        return $this->belongsTo('App\Order','order_id');
    }
    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
