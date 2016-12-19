<?php namespace Bedard\Socialite\Api;

use Bedard\Socialite\Classes\Callback;
use Bedard\Socialite\Models\Settings;
use Config;
use Illuminate\Routing\Controller;
use Socialite;

class FacebookController extends Controller
{
    /**
     * Socialite configuration.
     *
     * @return void
     */
    public function __construct()
    {
        Config::set('services.facebook', [
            'client_id' => Settings::facebookId(),
            'client_secret' => Settings::facebookSecret(),
            'redirect' => Settings::facebookCallback(),
        ]);
    }

    /**
     * Redirect.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Callback.
     *
     * @param  Callback $callback
     * @return
     */
    public function callback(Callback $callback)
    {
        $user = Socialite::driver('facebook')->user();

        return $callback->authenticate($user);
    }
}
