<?php namespace Bedard\Socialite\Api;

use Bedard\Socialite\Models\Settings;
use Config;

class GoogleController extends SocialiteController
{
    /**
     * Socialite configuration.
     *
     * @return void
     */
    public function __construct()
    {
        $this->driver = 'google';

        Config::set('services.google', [
            'client_id' => Settings::googleId(),
            'client_secret' => Settings::googleSecret(),
            'redirect' => Settings::googleCallback(),
        ]);
    }
}
