<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /* Defining the attributes that can be filled in the database. */
    protected $fillable = [
        'url_link'
    ];

    /**
     * > The `products()` function returns all the products that belong to a particular provider
     * 
     * @return A collection of products
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function info()
    {
        return $this->morphOne('App\Models\Info', 'infoable');
    }

    public function scopeName($query, $name = null)
    {
        if ($name) {
            return $query->where('url_link', 'like', "%{$name}%")
                ->orWhereHas('info', function (Builder $query) use ($name) {
                    $query->where('rut', 'like', "%{$name}%")
                    ->orWhere('name', 'like', "%{$name}%")
                    ->orWhere('lastname', 'like', "%{$name}%");
                });
        }
        return $query;
    }
}
