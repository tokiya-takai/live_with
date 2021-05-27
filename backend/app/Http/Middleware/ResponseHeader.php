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

        return $response;
    }
}
