<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    //
    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
