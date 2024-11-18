<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next , $roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        // Ambil role_id pengguna yang login
        $userRole = Auth::user()->role_id;
        if (!is_array($roles)) {
            $roles = explode(',', $roles);
        }

        if (!in_array($userRole, $roles)) {
            return redirect()->route('error');
        }


        return $next($request);
    }
}
