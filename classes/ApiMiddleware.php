<?php namespace Bedard\Socialite\Classes;

use Closure;
use Bedard\Socialite\Models\Settings;

class ApiMiddleware
{
    /**
     * Abort all requests when the HTTP API is not enabled.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return \Closure
     */
    public function handle($request, Closure $next)
    {
        if (! Settings::isEnabled()) {
            abort(403, 'Forbidden');

            return;
        }

        return $next($request);
    }
}
