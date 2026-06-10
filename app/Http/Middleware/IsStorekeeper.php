<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsStorekeeper
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->job != 'storekeeper'){
            abort(403);
        }

        return $next($request);
    }
}


//Pour le moment n'a pas trop d'utilité, mais ça pourra dans le futur
