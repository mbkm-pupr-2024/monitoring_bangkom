<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SupervisiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()){
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }
        if (!Auth::guard('supervisi')->check()){
            return redirect()->back()->with('error', 'Anda tidak memiliki akses');
        }
        return $next($request);
    }
}
