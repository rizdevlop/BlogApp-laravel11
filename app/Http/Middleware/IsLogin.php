<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login'); 
        }

        // Redirect berdasarkan role User atau Admin
        if (Auth::user()->role === 'Admin') {
            return redirect('/admin/dashboard'); 
        } elseif (Auth::user()->role === 'User') {
            return redirect('/user/home'); 
        }

        // Jika tidak ada role yang cocok, bisa kembalikan default response
        return $next($request);
    }
}
