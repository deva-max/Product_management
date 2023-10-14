<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CanCreateProduct
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('CanCreateProduct file');

        if (Gate::allows('create-product')) {
            Log::info('CanCreateProduct allows');
            return $next($request);
        }

        Log::info('CanCreateProduct Unauthorized');
        abort(403, 'Unauthorized');
    }
}
