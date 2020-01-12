<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body',
        'user_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    
}