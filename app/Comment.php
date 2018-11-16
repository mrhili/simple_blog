<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    /*
        L140: REFERENCE POST WITH COMMENT
    */
    public function post()
    {
        # code...
        
        return $this->belongsTo('App\Post');
    }
}
