<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'customer_id',
        'order_product_id',
    ];




    public function Products()
    {
        return $this->belongsTomany(Product::class,'products');

    }
}
