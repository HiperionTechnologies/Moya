<?php

namespace App\Http\Middleware;

use Closure;
use App\Sede;

class SedeUrl
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
        $sede = Sede::where('city',request()->segment(1))->first();
        if($sede){
            return $next($request);
        }
        else{
            return abort('404');
        }
    }
}
