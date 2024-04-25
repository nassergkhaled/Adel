<?php

namespace App\Http\Middleware;

use Closure;


class RegistrationComplete
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->completeRegistration) {
            return $next($request);
        }

        return redirect()->route('complete.registration');
    }
}
