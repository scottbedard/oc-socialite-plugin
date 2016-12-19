<?php namespace Bedard\Socialite\Api;

use Bedard\Socialite\Models\Settings;
use Config;
use Socialite;

class GithubController extends SocialiteController
{
    /**
     * Socialite configuration.
     *
     * @return void
     */
    public function __construct()
    {
        $this->driver = 'github';

        Config::set('services.github', [
            'client_id' => Settings::githubId(),
            'client_secret' => Settings::githubSecret(),
            'redirect' => Settings::githubCallback(),
        ]);
    }
}
