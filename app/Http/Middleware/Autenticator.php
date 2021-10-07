<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Autenticator
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
//       Para usar o autenticador global. obs: tem que ativar no Kernel.php
//
//        if (!$request->is('getin', 'register') && !Auth::check()) {
//            return redirect('/getin');
//        }

        if (!Auth::check()) {
            return redirect('/getin');
        }
        return $next($request);
    }
}
