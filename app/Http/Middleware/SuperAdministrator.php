<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdministrator
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
        if(auth()->user()->role == Config('Constants.userrole.super_admin')){
            return $next($request);
        }

        $request->session()->flash('message', 'You are not allowed to manage the settings.');

        return back();
    }
}
