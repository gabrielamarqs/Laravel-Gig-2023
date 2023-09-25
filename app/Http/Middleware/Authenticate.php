<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
        // toda vez que for fazer algo que precisa de login, nas rotas vc coloca request auth 
        // e dai o midleware vai fazer com que redirecione para a rota do login
        // ex.: Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
    }
}
