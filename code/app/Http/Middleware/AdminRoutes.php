<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRoutes
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
        if ( Auth::check() ){

            if ( Auth::user()->isAdmin() ){
                return $next($request);
            }
            
            if( Auth::user()->isUser() ){
                return redirect()->route('user.home');
            }

            Auth::logout();
        }
        return redirect()->route('login');
    }
}
