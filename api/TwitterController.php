<?php namespace Bedard\Socialite\Api;

use Bedard\Socialite\Models\Settings;
use Config;

class TwitterController extends SocialiteController
{
    /**
     * Socialite configuration.
     *
     * @return void
     */
    public function __construct()
    {
        $this->driver = 'twitter';

        Config::set('services.twitter', [
            'client_id' => Settings::twitterId(),
            'client_secret' => Settings::twitterSecret(),
            'redirect' => Settings::twitterCallback(),
        ]);
    }
}
