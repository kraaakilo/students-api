<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');
        if(!($request->header('Authorization') == "Vincent")){
            return response()->json([
                "message" => "You are not authorized to access this resource"
            ], 401);
        }
        return $next($request);
    }
}
