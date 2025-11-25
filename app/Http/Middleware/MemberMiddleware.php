<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // kalau belum login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silahkan login dulu!');
        }

        // kalau role bukan member
        if (Auth::user()->role != 'member') {
            return redirect('/login')->with('error', 'Access denied!');
        }

        return $next($request);
    }
}
