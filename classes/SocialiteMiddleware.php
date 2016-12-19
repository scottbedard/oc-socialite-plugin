<?php namespace Bedard\Socialite\Classes;

use Closure;

class SocialiteMiddleware
{
    /**
     * Abort all requests when not enabled.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return \Closure
     */
    public function handle($request, Closure $next)
    {
        if (! $this->isEnabled) {
            abort(403, 'Forbidden');

            return;
        }

        return $next($request);
    }
}
