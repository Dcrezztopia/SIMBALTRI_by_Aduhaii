<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect("login");
        }

        $user = Auth::user();

        if ($role == "admin") {
            switch ($user->role) {
                case 'admin':
                case 'ketua_rw':
                case 'ketua_rt':
                case 'sekretaris_rw':
                case 'sekretaris_rt':
                case 'bendahara_rw':
                case 'bendahara_rw':
                    return $next($request);
            }
        }

        if ($user->role == $role) {
            return $next($request);
        }

        return redirect("login")->with("error", "Maaf, Anda tidak memiliki akses");
    }
}
