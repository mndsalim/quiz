<?php

namespace App\Http\Middleware;

use Closure;
use App\user;
use Illuminate\Support\Facades\Auth;

class AppAuthKey
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
        if(request()->header('APP_KEY') != env('APP_AUTH_KEY')){
            return response()->json(['message' => 'UnAuthorized APP'],401);
        }
    
        return $next($request);
    }
}
