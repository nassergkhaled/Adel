<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class notManager
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role !== 'Manager') {
            return $next($request);
        } else
            return redirect()->route('dashboard');
    }
}
