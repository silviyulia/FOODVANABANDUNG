<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // User belum login
            return redirect('/login')->with('error', 'Harus login terlebih dahulu.');
        }

        $user = Auth::user();

        if (in_array($user->role, $roles)) {
            // Role cocok, lanjut request
            return $next($request);
        }
        // Role tidak sesuai
        return redirect('/login')->with('error', 'Akses ditolak.');
    }
}
