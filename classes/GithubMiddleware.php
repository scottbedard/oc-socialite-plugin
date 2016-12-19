<?php namespace Bedard\Socialite\Classes;

use Bedard\Socialite\Models\Settings;

class GithubMiddleware extends SocialiteMiddleware
{
    public function __construct()
    {
        $this->isEnabled = Settings::githubIsEnabled();
    }
}
