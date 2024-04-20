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

    public function customers()
    {
        return $this->belongsToMany(Customer::class,'carts');

    }

    public function order()
    {
        return $this->belongsToMany(Order::class ,'orders');

    }
}
