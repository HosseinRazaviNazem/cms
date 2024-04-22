<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'phone',
        'email',
        'username',
        'password',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function products()

    {
        return $this->belongsToMany(Product::class,'carts');

    }

    public function order()
    {

    }

}
