<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ResponseHeader
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Setting not to explicitly cache in response header
        $response->header('Cache-Control', 'no-cache, private');

        // Setting not to use iframe
        $response->header('X-Frame-Options', 'DENY');

        // XSS measures
        // -- Same as the default, but explicitly stated. --
        // $response->header('Content-Type', 'charset=UTF-8');

        return $response;
    }
}
