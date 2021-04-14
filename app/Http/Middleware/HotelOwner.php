<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HotelOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->hotel()->count() == 1){
            return $next($request);
        }
        else{
            return redirect()->back();    
        }
        
    }
}
