<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Redirect jika bukan admin
        // return redirect('/admin/login')->withErrors(['access' => 'Unauthorized access.']);
        abort(401, 'Unauthorized access.');
    }
}
