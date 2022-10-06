<?php

namespace App\Models;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /* Defining the attributes that can be filled in the database. */
    protected $fillable = [
        'name',
        'price',
        'stock',
        'provider_id'
    ];

    /**
     * The provider() function returns the provider that belongs to the product
     * 
     * @return The provider that is associated with the product.
     */
    public function provider()
    {
        return $this->belongsTo('App\Models\Provider');
    }

    /**
     * > This function returns a collection of subsidiaries that are associated with the current product
     * 
     * @return A collection of subsidiaries
     */
    public function subsidiaries()
    {
        return $this->belongsToMany('App\Models\Subsidiary');
    }

    /**
     * The sales() function returns a collection of sales that belong to the product
     * 
     * @return A collection of sales
     */
    public function sales()
    {
        return $this->belongsToMany('App\Models\Sale')
        ->withPivot('quantity','subTotal', 'price')->withTimestamps();
    }

    public function scopeName($query, $name = null)
    {
        if ($name) {
            return $query->where('name', 'like', "%{$name}%")
                ->orWhereHas('provider', function (Builder $query) use ($name) {
                    $query->where('name', 'like', "%{$name}%");
                })
                ->orWhereHas('subsidiaries', function (Builder $query) use ($name) {
                    $query->where('name', 'like', "%{$name}%");
                });
        }
        return $query;
    }
}
