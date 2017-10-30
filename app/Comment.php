<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['film_id', 'user_id', 'name', 'comment'];
    /**
     * Get the film that owns the comment.
     */
    public function film()
    {
        return $this->belongsTo('App\Film');
    }

    /**
     * Get the user that posted the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
