<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $guarded = [];

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }

    public function orders(){
        return $this->belongsToMany('App\Order','items','product_id','order_id');
    }
    public function items(){
        return $this->hasMany('App\Item','product_id');
    }
    public function getUrlAttribute(){
        if(substr($this->imagen,0,4)==='http'){
            return $this->imagen;
        }
        return '/storage/'.$this->imagen;
    }
    public function getCategoryNombreAttribute(){
        if($this->category){
            return $this->category->nombre;
        }
        return 'General';
    }
}
