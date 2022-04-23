<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$key = $request->header('X-CUSTOM-APIKEY') or $key !== config('app.api_key')) {
            return response()->json([
                'error' => 'api key invalid'
            ])->setStatusCode(401);
        }
        return $next($request);
    }
}
