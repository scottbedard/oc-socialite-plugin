<?php namespace Bedard\Socialite\Classes;

use Bedard\Socialite\Models\Settings;

class GoogleMiddleware extends SocialiteMiddleware
{
    public function __construct()
    {
        $this->isEnabled = Settings::googleIsEnabled();
    }
}
