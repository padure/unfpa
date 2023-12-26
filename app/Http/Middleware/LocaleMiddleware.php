<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

/**
 * Class LocaleMiddleware.
 */
class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Locale is enabled and allowed to be changed
        if (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
            App::setLocale(session()->get('locale'));
            setlocale(LC_TIME, session()->get('locale'));
            Carbon::setLocale(session()->get('locale'));
        }

        return $next($request);
    }
}
