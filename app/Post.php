<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    /*
    L54: DATABASE LINKING
    */
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    
    /*
    L79: DATABASE LINKING
    */
    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    
    /*
        L99: ADDING THE FUNCTION OF MEAN
            RETURNING TITLE LIKE WATH TYPE IN IT
    */
    public function scopeSearch($query, $search){
        return $query->where('title', 'LIKE', "%$search%");
    }
    
    
    
    /*
    L120: DATABAS LINKING WITH USER
    */
    public function users(){
        return $this->belongsToMany('App\User');
    }
    
    /*
        L141: REFERENCE COMMENTS
    */
    
    public function comment()
    {
        # code...
        return $this->hasMany('App\Comment');
    }
    
    
    
}
