<?php namespace Bedard\Socialite\Classes;

use Bedard\Socialite\Models\Settings;

class TwitterMiddleware extends SocialiteMiddleware
{
    public function __construct()
    {
        $this->isEnabled = Settings::twitterIsEnabled();
    }
}
