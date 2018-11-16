<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    /*
    L53: DATABASE LINKING
    */
    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}
