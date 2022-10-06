<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    
   /* Defining the attributes that can be filled in the database. */
    protected $fillable = [
        'street',
        'nro',
        'commune_id'
    ];

   /**
    * > The commune() function returns the commune that the address belongs to
    * 
    * @return The commune that the address belongs to.
    */
    public function commune()
    {
        return $this->belongsTo('App\Models\Commune');
    }
        

    /**
     * The `info()` function returns a relationship between the `User` model and the `Info` model
     * 
     * @return The user has one info.
     */
    public function info()
    {
        return $this->hasMany('App\Models\Info');
    }
}
