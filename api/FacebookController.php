<?php namespace Bedard\Socialite\Api;

use Bedard\Socialite\Models\Settings;
use Config;

class FacebookController extends SocialiteController
{
    /**
     * Socialite configuration.
     *
     * @return void
     */
    public function __construct()
    {
        $this->driver = 'facebook';

        Config::set('services.facebook', [
            'client_id' => Settings::facebookId(),
            'client_secret' => Settings::facebookSecret(),
            'redirect' => Settings::facebookCallback(),
        ]);
    }
}
