<?php namespace Bedard\Socialite\Classes;

use GuzzleHttp;

class EmailRequest
{
    /**
     * Fetch the user's email if it wasn't returned in the original request.
     *
     * @param  string                                                   $driver
     * @param  \Laravel\Socialite\One\User|\Laravel\Socialite\Two\User  $user
     * @return string|null
     */
    public function get($driver, $user)
    {
        if ($driver === 'github') return $this->getGithubEmail($user);

        return null;
    }

    /**
     * Request the user's email from GitHub.
     *
     * @param  \Laravel\Socialite\Two\User  $user
     * @return string|null
     */
    public function getGithubEmail($user)
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
        $fallbackEmail = null;

        foreach (array_reverse($emails) as $email) {
            if ($email['primary']) {
                return $email['email'];
            }

            $fallbackEmail = $email['email'];
        }

        // if no primary email was found, return the fallback email
        return $fallbackEmail;
    }
}
