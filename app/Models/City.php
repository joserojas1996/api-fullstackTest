<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /* Defining the attributes that can be filled in the database. */
    protected $fillable = [
        'name'
    ];

    /**
     * > The communes() function returns all the communes that belong to a given city
     */
    public function communes()
    {
        return $this->hasMany('App\Models\Communes');
    }
}
