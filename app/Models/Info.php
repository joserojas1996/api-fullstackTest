<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{

    /* Defining the attributes that can be filled in the database. */
    protected $fillable = [
        'rut',
        'name',
        'lastname',
        'phone',
        'infoable_id',
        'infoable_type',
        'address_id'
    ];

    /**
     * > This function returns the address that belongs to the info user
     * 
     * @return The address of the user.
     */
    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }

    public function infoable()
    {
        return $this->morphTo();
    }
}
