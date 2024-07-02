<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class pendingJoinRequest
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->acceptedByManager == 0) {
            return $next($request);
        } else
            return redirect()->route('dashboard');
    }
}
