<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'orderType', 'orderData', 'user_id','product_id','shipping_address','city','quantity','status'
    ];

    public function  product()
    {
        $this->hasMany(Product::class,'product_id');
    }
    public function user()
    {
        $this->hasMany(User::class,'user_id');
    }
}
