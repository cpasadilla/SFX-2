<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class StaffMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){

            // Admin == 1
            // User == 0
            if(Auth::user()->isStaff == 1 ){
                return $next($request);     
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/login');
    
        }
        return $next($request);
    }
}
