<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Adicione esta linha para excluir todas as suas rotas de API mobile
        // da verificação CSRF. O asterisco (*) funciona como um coringa.
        'mobile/*'
    ];
}
