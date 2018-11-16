<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*
L124.9: USE DB 
*/
use Illuminate\Support\Facades\DB;


/*
    L125: INITIALIZE THE ProfileController WITH THE MODELS

*/
use App\User;

use App\Post;

use Auth;


/**/
class ProfileController extends Controller
{
    //
    /*
        L126: EMPECHING PEOPLE TO SEE PROFILE TO OTHER PEOPLES
    */
    public function profile($id)
    {
        # code...
        $fav = DB::table('post_user')->whereUserId(Auth::user()->id)->pluck('post_id')->all();
        $user = User::find( $id );
        if( $user->id != Auth::user()->id ) {
            # code...
            return redirect('/');
        }else{
            return view('profile', compact('user', 'fav') );
        }
    }
    
    /*
        L128: MAKING THE FAVORITE AND THE STORE CONTROLLER
    */
    public function favorite($id)
    {
        # code...
        $fav = DB::table('post_user')->whereUserId(Auth::user()->id)->pluck('post_id')->all();
        $id = Auth::user()->id;
        $user = User::find( $id );
        if( $user->id != Auth::user()->id ) {
            # code...
            return redirect('/');
        }else{
            return view('favorites', compact('user', 'fav') );
        }
    }
    
    
    public function store($id)
    {
        # code...
        $post = Post::find($id);
        $post->users()->sync( [ Auth::user()->id ], false ); 
        return redirect('/');
        
    }
    /*
    L132: MAKING THE DELETE CONTROLLER
    */
    
    public function destroy( $uid, $pid)
    {
        # code...
        $post = Post::find($pid);
        $post->users()->detach();
        $post->save();
        return back();
        
    }
    
}
