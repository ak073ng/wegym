<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','surname', 'email', 'password','age', 'gender', 'pwl','user_weight', 'target_weight',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * @return mixed
    */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
    * @return array
    */
    public function getJWTCustomClaims()
    {
        return ['user' => ['id' => $this->id]];
    }
}
