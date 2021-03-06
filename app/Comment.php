<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body','text_id', 'user_id'
    ];

    public function text()
    {
        return $this->belongsTo('App\Text');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
