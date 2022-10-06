<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /* Defining the attributes that can be filled in the database. */
    protected $fillable = [
        'total',
        'user_id',
        'client_id'
    ];

    /**
     * > The `user()` function returns the user that owns the sale
     * 
     * @return A collection of all the comments that belong to the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * > This function returns the client that this sale belongs to
     * 
     * @return The client that is associated with the invoice.
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    /**
     * The `products()` function returns a collection of products that belong to the order
     * 
     * @return A collection of products that belong to the order.
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product')
        ->withPivot('quantity','subTotal', 'price')->withTimestamps();
    }

    /**
     * > If the name parameter is not null, then return the query with the orWhereHas function, which
     * will return the query with the whereHas function, which will return the query with the where
     * function, which will return the query with the like function, which will return the query with
     * the name parameter
     * 
     * @param query The query builder instance.
     * @param name The name of the scope.
     * 
     * @return A query builder instance.
     */
    public function scopeName($query, $name = null)
    {
        if ($name) {
            return $query->orWhereHas('client', function (Builder $query) use ($name) {
                    $query->where('name', 'like', "%{$name}%");
                })
                ->orWhereHas('user', function (Builder $query) use ($name) {
                    $query->where('name', 'like', "%{$name}%");
                });
        }
        return $query;
    }

   
}
