<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'orginal_price',
        'total_price',
        'order_id',
        'product_id',
    ];



    public function orders()
    {

    }
    public function products()
    {

    }
}


