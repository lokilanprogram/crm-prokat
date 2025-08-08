<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // $roles теперь массив (например, ['superadmin'])
        $user = Auth::user();

        if (!in_array($user->role, $roles)) {
            // Можно редиректить или 403 отдавать
            abort(403, 'Доступ запрещён');
        }

        return $next($request);
    }
}

