<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    protected $fillable = [
        'quantity',
        'customer_id',
        'product_id',
    ];
    public function customers()
    {
        return $this->belongsToMany(Customer::class,'customer');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product');

    }




}
