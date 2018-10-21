<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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
        if (!(boolean)$request->user()['isAdmin']) {
            return response()->json([
                'status' => 'no super user'
            ], 400);
        }
        return $next($request);
    }
}
