<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    /**
     * It returns the primary key of the authenticated user
     * 
     * @return The primary key of the user.
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * > This function is used to add additional data to the JWT
     * 
     * @return An empty array.
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The sales() function returns all the sales records that belong to the vendor
     * 
     * @return A collection of sales
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Sales');
    }

    public function info()
    {
        return $this->morphOne('App\Models\Info', 'infoable');
    }

    public function scopeName($query, $name = null)
    {
        if ($name) {
            return $query->where('email', 'like', "%{$name}%")
                ->orWhereHas('info', function (Builder $query) use ($name) {
                    $query->where('rut', 'like', "%{$name}%")
                    ->orWhere('name', 'like', "%{$name}%")
                    ->orWhere('lastname', 'like', "%{$name}%");
                });
        }
        return $query;
    }
}
