<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    /* Defining the attributes that can be filled in the database. */
    protected $fillable = [
        'name',
        'city_id',
    ];

    /**
     * > The address() function returns a collection of Address models that are associated with the
     * current User model
     * 
     * @return A collection of all the addresses associated with the user.
     */
    public function address()
    {
        return $this->hasMany('App\Models\Address');
    }

    /**
     * The city() function returns the city that the user belongs to
     * 
     * @return The city that the user belongs to.
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
