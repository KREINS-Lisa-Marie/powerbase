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
            if ($request->routeIs('pages::dashboard.index')) {
                return redirect()->route('worker.homepage', ['locale' => app()->getLocale() ?? 'fr']);
            }
            abort(403);
        }

        return $next($request);
    }
}
