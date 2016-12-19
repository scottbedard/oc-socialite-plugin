<?php namespace Bedard\Socialite\Classes;

use Closure;
use Bedard\Socialite\Models\Settings;

class FacebookMiddleware
{
    /**
     * Abort all requests when the Facebook authentication is not enabled.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return \Closure
     */
    public function handle($request, Closure $next)
    {
        if (! Settings::facebookIsEnabled()) {
            abort(403, 'Forbidden');

            return;
        }

        return $next($request);
    }
}
