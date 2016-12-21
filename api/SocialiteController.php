<?php namespace Bedard\Socialite\Api;

use Bedard\Socialite\Classes\Callback;
use Bedard\Socialite\Models\Settings;
use Illuminate\Routing\Controller;
use Redirect;
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
        $redirectUrl = Settings::redirectUrl();

        $callback->setDriver($this->driver);
        $user = $callback->authenticate();

        return $redirectUrl
            ? Redirect::to($redirectUrl)
            : $user;
    }
}
