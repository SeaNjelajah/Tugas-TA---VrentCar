<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Admin
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
        

        if (Auth::check()) {

            $id = Auth::user()->id;
            $group = User::find($id)->group;

            if ($group == 'admin')
                return $next($request);
            else
                return redirect()->intended(route('Home'));
        }

        return redirect(route('LoginView'))->withInput();
    }
}
