<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function carts()

    {
        return $this->hasMany(Cart::class);

    }

    public function order()
    {

    }

}
