<?php

namespace App\Http\Middleware;

use Closure;

class MonitorMiddleware
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
      if ($request->input('level') == 5)
       {
          session()->flash('danger','权限不够');
          return back();
       }
        return $next($request);
    }
}
