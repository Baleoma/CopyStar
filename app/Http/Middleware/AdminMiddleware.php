<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Проверяем авторизацию и роль
        if (auth()->check() && auth()->User()->role_id === 1) {
            return $next($request);
        }

        // Если не админ - ошибка 403
        abort(403, 'Доступ запрещен');
    }
}
