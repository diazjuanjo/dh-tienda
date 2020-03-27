<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Order;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellido','email','rol', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders(){
        return $this->hasMany('App\Order','user_id');
    }

    public function getOrderAttribute(){
        $order = $this->orders()->where('estado','carrito')->first();
        if($order)
            return $order;
        $order = new Order();
        $order->estado = 'carrito';
        $order->user_id = $this->id;
        
        $order->save();

        return $order;
    }
    public function getOrdersAttribute(){
        $orders = $this->orders()->where('estado','pedido')->get();
        return $orders;
    }
    // public function getShowAttribute($id){
    //     $item = $this->orders()->items->where('product_id',$id)->first();

    //     return $item;
    // }
}
