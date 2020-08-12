<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $type)
    {
        $user = $this->guard()->user();

        if($user->$type =='admin'){
            return '/admin/category/index';
        }
         else {
             return '/homepage';
         }
    
        return $next($request);
    }

    public function guard(){
        return Auth::guard('web');  
    }
}
