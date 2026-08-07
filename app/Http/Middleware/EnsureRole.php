<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        if (in_array(Auth::user()->role, $roles, true)) {
            return $next($request);
        }

        $route = Auth::user()->role === 'admin'
            ? 'admin.dashboard'
            : 'masyarakat.dashboard';

        return redirect()->route($route)->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
    }
}
