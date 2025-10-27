<?php

namespace App\Http\Middleware;

use Closure;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {     $token = $request->cookie('token');

        if (!$token) {
            return redirect('/login_page')->with('error', 'Token not found');
        }

        $decoded = JWTToken::VerifyToken($token);

        if ($decoded) {
            // Log in the user manually for this request
            Auth::loginUsingId($decoded->userId);
            return $next($request);
        }

        return redirect('/login_page')->with('error', 'Invalid token');
    }
        
}
