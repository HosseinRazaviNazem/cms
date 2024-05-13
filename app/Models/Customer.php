<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Customer extends  Authenticatable implements JWTSubject
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
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];

    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }



}
