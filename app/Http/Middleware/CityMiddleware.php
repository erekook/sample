<?php

namespace App\Http\Middleware;
use App\Http\Middleware\Entrust;
use Closure;

class CityMiddleware
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
        if(!Entrust::can('city_visit')){
          session()->flash('danger','权限不够!');
        }
        return $next($request);
    }
}
