<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomTokenAuthentication
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the 'token' session value is set
        if ($request->session()->has('token')) {
            // Allow the request to proceed
            return $next($request);
        }

        // Redirect to login page or return unauthorized response
        return redirect()->route('login');
    }
}