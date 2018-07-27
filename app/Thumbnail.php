<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    protected $fillable = [
        'image', 'product_url','status', 'user_id',
    ];
    public function  images()
    {
        $this->hasMany(User::class,'user_id');
    }
}
