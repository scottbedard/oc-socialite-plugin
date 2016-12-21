<?php namespace Bedard\Socialite\Classes;

use GuzzleHttp;
use Laravel\Socialite\Two\User;

class EmailRequest
{
    /**
     * Fetch the user's email if it wasn't returned in the original request.
     *
     * @param  string                       $driver
     * @param  \Laravel\Socialite\Two\User  $user
     * @return string|null
     */
    public function get($driver, User $user)
    {
        if ($driver === 'github') return $this->getGithubEmail($user);

        return null;
    }

    /**
     * Request the user's email from GitHub.
     *
     * @return string
     */
    public function getGithubEmail(User $user)
    {
        // fetch the user's emails from github
        $emails = (new GuzzleHttp\Client())
            ->get('https://api.github.com/user/emails', [
                'auth' => [
                    $user->user['login'],
                    $user->token,
                ],
            ])
            ->json();

        // find and return the user's primary email address
        foreach ($emails as $email) {
            if ($email['primary']) {
                return $email['email'];
            }
        }

        // if no primary email was found, return null
        return null;
    }
}
