<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //product has many to customer

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
    ];

    public function carts()
    {
        return $this->belongsToMany(Cart::class,'cart');

    }

    public function order()
    {
        return $this->hasMany(Order::class ,'order_id');

    }
}
