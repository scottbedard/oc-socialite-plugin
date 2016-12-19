<?php namespace Bedard\Socialite\Api;

use Bedard\Socialite\Classes\Callback;
use Bedard\Socialite\Models\Settings;
use Config;
use Illuminate\Routing\Controller;
use Socialite;

class GithubController extends Controller
{
    public function __construct()
    {
        Config::set('services.github', [
            'client_id' => Settings::githubId(),
            'client_secret' => Settings::githubSecret(),
            'redirect' => Settings::githubCallback(),
        ]);
    }

    /**
     * Redirect.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback(Callback $callback)
    {
        $user = Socialite::driver('github')->user();

        return $callback->authenticate($user);
    }
}
