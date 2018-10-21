<?php

namespace App\Http\Middleware;

use Closure;

class CheckAcceptHeader
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
        if ($request->header('Accept') != 'application/json') {
            return response()->json([
                'status' => 'miss Accept header'
            ], 400);
        }

        if ($request->header('Authorization') == null) {
            return response()->json([
                'status' => 'miss Authorization header'
            ], 400);
        }
        return $next($request);
    }
}
