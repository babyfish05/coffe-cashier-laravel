<?php

namespace App\Http\Middleware;

use App\Http\Requests\AuthRequest;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cekUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $rules)
    {
       $User = Auth::user();

       if(!Auth::check()){
        return redirect('login');
       }
       if($User->level == $rules)
       return $next($request);
       
       return redirect('login')->with('error','you have no privildge');
    }
}
