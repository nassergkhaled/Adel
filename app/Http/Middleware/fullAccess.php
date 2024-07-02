<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class fullAccess
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->access == 1) {
            return $next($request);
        } else
            return redirect()->route('suspendedAccess');
    }
}
