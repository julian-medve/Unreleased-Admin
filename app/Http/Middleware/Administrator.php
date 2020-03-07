<?php

namespace App\Http\Middleware;

use Closure;
use Config\Constants;


class Administrator
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
        if(auth()->user()->role == Config('Constants.userrole.super_admin')
            || auth()->user()->role == Config('Constants.userrole.admin')){
                
            return $next($request);
        }

        $request->session()->flash('message', 'You are not allowed to manage the settings.');

        return back();
    }
}
