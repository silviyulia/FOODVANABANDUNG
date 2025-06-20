<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = session('user');

        if (!$user) {
            // User belum login
            return redirect('/login')->with('error', 'Harus login terlebih dahulu.');
        }

        if (in_array($user->role, $roles)) {
            // Role cocok, lanjutkan
            return $next($request);
        }

        // Role tidak sesuai
        return redirect('/Foodvana')->with('error', 'Akses ditolak.');
    }
}
