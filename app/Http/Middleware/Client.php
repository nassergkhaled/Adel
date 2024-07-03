<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Client
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role == 'Client') {
            return $next($request);
        } else
            return redirect()->route('dashboard');
    }
}
