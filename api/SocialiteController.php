<?php namespace Bedard\Socialite\Api;

use Bedard\Socialite\Classes\Callback;
use Illuminate\Routing\Controller;
use Socialite;

class SocialiteController extends Controller
{
    /**
     * @var string|null     Socialite driver.
     */
    protected $driver = null;

    /**
     * Redirect.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect()
    {
        return Socialite::driver($this->driver)->redirect();
    }

    /**
     * Callback.
     *
     * @param  Callback $callback
     * @return
     */
    public function callback(Callback $callback)
    {
        $user = Socialite::driver($this->driver)->user();

        return $callback->authenticate($user);
    }
}
