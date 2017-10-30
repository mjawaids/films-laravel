<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['name', 'slug', 'photo', 'description', 'release_date', 'rating', 'ticket_price', 'country'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the comments for the film.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * The genre that belong to the film.
     */
    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }
}
