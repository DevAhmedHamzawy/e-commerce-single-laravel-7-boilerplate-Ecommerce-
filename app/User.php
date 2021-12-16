<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function shippingAddresses()
    {
        return $this->hasMany(ShippingAddress::class)->orderBy('id', 'desc');
    }

    public function latestShippingAddress()
    {
        return $this->hasOne(ShippingAddress::class)->orderByDesc('id', 'desc');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
