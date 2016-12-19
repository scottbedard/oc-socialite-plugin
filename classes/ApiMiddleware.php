<?php namespace Bedard\Socialite\Classes;

use Bedard\Socialite\Models\Settings;

class ApiMiddleware extends SocialiteMiddleware
{
    public function __construct()
    {
        $this->isEnabled = Settings::isEnabled();
    }
}
