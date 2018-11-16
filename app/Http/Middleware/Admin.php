<?php

namespace App\Http\Middleware;

use Closure;

/*

*/
use Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
            L93 ADDING A MIDDLEWARE FOR NOTICING THE USERS
        */
        if( Auth::check() && Auth::user()->isAdmin() ){
            return $next($request);    
        }else{
            return redirect('/');
        }
        
    }
}
