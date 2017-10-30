<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * The films that belong to the genre.
     */
    public function films()
    {
        return $this->belongsToMany('App\Film');
    }
}
