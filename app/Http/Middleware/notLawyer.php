<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class notLawyer
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role !== 'Lawyer') {
            return $next($request);
        } else
            return redirect()->route('dashboard');
    }
}
