<?php

namespace App\Http\Middleware;

use Closure;

class CheckContentTypeHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->header('Content-Type') != 'application/json') {
            return response()->json([
                'status' => 'miss Content-Type header'
            ], 400);
        }

        return $next($request);
    }
}
