<?php namespace Bedard\Socialite\Classes;

use Bedard\Socialite\Models\Settings;

class FacebookMiddleware extends SocialiteMiddleware
{
    public function __construct()
    {
        $this->isEnabled = Settings::facebookIsEnabled();
    }
}
