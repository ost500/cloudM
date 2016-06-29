<?php

namespace App\Http\Middleware;

use App\Events\VisitorTracker;
use Closure;
use Illuminate\Support\Facades\Event;

class Logging
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
        Event::fire(new VisitorTracker($request->fullUrl(), $request->getClientIp()));
        return $next($request);
    }
}
