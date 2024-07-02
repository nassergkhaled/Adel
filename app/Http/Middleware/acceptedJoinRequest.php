<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class acceptedJoinRequest
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->acceptedByManager == 1) {
            return $next($request);
        } else
            return redirect()->route('pendingJoinRequest');
    }
}
