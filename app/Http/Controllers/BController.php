<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
/*
L34.9: USING THE CLASS Post IN The Providers/Post.php
*/
use App\Post;

class BController extends Controller
{
    //
   
    /*
    CHANGING THE TO 
    
    public function slug($slug)
    {
        # code...
         $post = Post::where('slug', '=', $slug)->first();
         return view('b.s', compact('post'));
    }
    
    AN AFFECTIVE SEARCH QUERY
    
    THAT CAN RECOG IZE THE COMMING REQUEST AND 
    RETURN BACK A RESULT
    */
    /*
        L100
        CHANGE 
            public function slug(Request $request, $slug)
        TO
    */
    public function slug(Request $request, $slug)
    {
        
        $query = $request->get('q');

        if( $query ){
            
            $posts = $query ? Post::search( $query )->orderBy( 'id', 'desc' )->paginate('7') : Post::all();

            return view('home', compact('posts') );
            
        }else{
            
            $post = Post::where('slug', '=', $slug)->first();
            
            return view('b.s', compact('post', 'user'));
            
        }
        
    }
    
}
