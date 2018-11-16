<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /*
            L94: This looks for admin column in the users table
        */
    public function isAdmin()
    {
        
        return $this->admin;
    }

/*
            L95: This looks for admin column in the users table
        */

    public function user()
    {
        /*
            L95: This looks for admin column in the users table
        */
        return $this;
    }
    
    
    /*
    L121.2: DATABAS LINKING WITH  Post
    */
    public function UserPost(){
        return $this->belongsToMany('App\Post');
    }
}
