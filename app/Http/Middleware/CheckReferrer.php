<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckReferrer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->headers->has('referer')) {
            // Không có HTTP_REFERER, do đó, chặn truy cập
            abort(403, 'Forbidden - Truy cập trực tiếp không được phép.');
        }

        return $next($request);
    }
}
