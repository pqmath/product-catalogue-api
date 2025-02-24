<?php

namespace App\Http\Middleware;

use App\Http\Middleware\Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'categories/*',
        'products/*'
    ];

    public function handle($request, Closure|\Closure $next)
    {
        // Desabilitar verificação CSRF temporariamente para testes
        return $next($request);
    }
}
