<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminOrStorekeeper
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->user()->job != 'storekeeper' && auth()->user()->job != 'admin'){
            abort(403);
        }

        return $next($request);
    }
}
