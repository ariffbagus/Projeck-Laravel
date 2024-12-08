<?php
 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Tambahkan ini

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Memeriksa apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('/'); // Pengguna tidak terautentikasi
        }

        $userRole = Auth::user()->role;
       
        // Memeriksa apakah role pengguna ada dalam array $roles
        if (!in_array($userRole, $roles)) {
     
            return redirect('/'); // Pengguna tidak memiliki hak akses
        }

        return $next($request); // Melanjutkan permintaan
    }
}

