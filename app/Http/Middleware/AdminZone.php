<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminZone
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

        if (Auth::check() and Auth::user()->group == 'admin') {
            return $next($request);
        }

        return redirect(route('LoginView'))->withInput();
    }
}
