<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'customer_id',
        'address',
        'gender',
        'birthday',
        'avatar',
        'city',
        'state',
        'status',
    ];



    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
}
