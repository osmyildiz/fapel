<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $locale = $request->segment(1);

        if (! in_array($locale, ['tr', 'en', 'ar'])) {
            $locale = session('app_locale', 'tr'); // Varsayılan dil
        }

        app()->setLocale($locale);

        return $next($request);
    }


}
