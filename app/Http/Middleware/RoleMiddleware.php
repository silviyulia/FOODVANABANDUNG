<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = session('user');

        if (!$user) {
            return redirect('/login')->with('error', 'Harus login terlebih dahulu.');
        }

        if (!in_array($user->role, $roles)) {
            return redirect('/Foodvana')->with('error', 'Akses ditolak. Role tidak sesuai.');
        }

        return $next($request);
    }
}
