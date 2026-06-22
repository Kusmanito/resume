<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Временно разрешаем всем (потом поменяем на проверку email)
        if (auth()->check() && auth()->user()->email === 'admin@test.ru') {
            return $next($request);
        }
        
        abort(403, 'Доступ запрещён');
    }
}