<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckPermision
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
      if (Auth::user()->user_type != 'admin') {
        return redirect()->back();
      }

        return $next($request);
    }
}
