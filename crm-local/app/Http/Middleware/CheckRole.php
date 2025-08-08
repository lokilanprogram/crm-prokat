<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Попытаться получить пользователя из web-сессии или api guard
        $user = $request->user() ?? auth('api')->user();
        if (!$user || !in_array($user->role, $roles, true)) {
            // Для API возвращаем JSON, для web - стандартный 403
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Нет доступа'], 403);
            }
            abort(403, 'Нет доступа');
        }
        return $next($request);
    }
}
