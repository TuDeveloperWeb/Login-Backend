<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|null  ...$guards
     */

        public function handle(Request $request, Closure $next, ...$guards)
{
    // Elimina la lógica del guard específico
    if (!Auth::check()) {
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }
        return redirect()->guest('/login');
    }

    // Verificación de rol
    $user = Auth::user();
    if ($request->is('admin/*') && $user->role !== 'admin') {
        return redirect($user->role === 'admin' ? '/admin/dashboard' : '/student/dashboard');
    }

    if ($request->is('student/*') && $user->role !== 'student') {
        return redirect($user->role === 'admin' ? '/admin/dashboard' : '/student/dashboard');
    }

    return $next($request);
}


    }
