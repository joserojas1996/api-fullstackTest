<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * > The sales() function returns all the sales that belong to the customer
     * 
     * @return A collection of all the sales associated with the client.
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Sale');
    }

    public function info()
    {
        return $this->morphOne('App\Models\Info', 'infoable');
    }

    public function scopeName($query, $name = null)
    {
        if ($name) {
            return $query->orWhereHas('info', function (Builder $query) use ($name) {
                    $query->where('rut', 'like', "%{$name}%")
                    ->orWhere('name', 'like', "%{$name}%")
                    ->orWhere('lastname', 'like', "%{$name}%");
                });
        }
        return $query;
    }
}
