<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;


class Admin extends Model //Authenticatable implements JWTSubject
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

