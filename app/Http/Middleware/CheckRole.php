<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Pastikan pengguna sudah terotentikasi
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Dapatkan peran pengguna saat ini
        $userRole = Auth::user()->role;

        // Periksa apakah peran pengguna termasuk dalam roles yang diperbolehkan
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Jika peran pengguna tidak sesuai, redirect ke halaman yang sesuai
        return redirect('/');
    }
}
