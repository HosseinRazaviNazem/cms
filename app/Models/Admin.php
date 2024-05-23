<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;


class Admin extends  Authenticatable implements JWTSubject
{
    use HasFactory;


    protected $fillable = [
        'phone',
        'email',
        'username',
        'password',
    ];

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


    public function getJWTCustomClaims()
{
    return [];
}

}

