<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    /* Defining the attributes that can be filled in the database. */
    protected $fillable = [
        'name',
        'iso',
        'currency_name',
        'currency_code',
        'currency_symbol'
    ];

   /**
    * The `products()` function returns a collection of products that belong to the subsidiary
    * 
    * @return A collection of products
    */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function scopeName($query, $name = null)
    {
        if ($name) {
            return $query->where('name', 'like', "%{$name}%")
                ->orWhere('iso', 'like', "%{$name}%");
        }
        return $query;
    }

}
