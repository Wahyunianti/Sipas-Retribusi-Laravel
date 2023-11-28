<?php

namespace App\Http\Middleware;

use App\Http\Controllers\RetribusiKelolaController;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckRole
{
      /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (in_array(auth()->user()->role_id, $roles)) {
            try {
                $user = JWTAuth::parseToken()->authenticate();
            } catch (Exception $e) {
                if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                    return response()->json(['status' => 'Token is Invalid']);
                } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                    return response()->json(['status' => 'Token is Expired']);
                } else {
                    // return $next($request);
                    // return response()->json(['status' => 'Authorization Token not found']);
                }
            }
            
            return $next($request);
        }

        return redirect('/redirect');        
    }
}
