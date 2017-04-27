<?php namespace Bedard\Socialite\Classes;

use Bedard\Socialite\Models\ApiSettings;

class StandardMiddleware extends SocialiteMiddleware
{
    public function __construct()
    {
        $this->isEnabled = ApiSettings::isEnabled();
    }
}
