<?php namespace Bedard\Socialite\Classes;

use Auth;
use Bedard\Socialite\Classes\EmailRequest;
use Carbon\Carbon;
use Laravel\Socialite\Two\User as SocialiteUser;
use RainLab\User\Models\User as RainLabUser;
use Socialite;

class Callback
{
    /**
     * @var String
     */
    protected $driver;

    /**
     * Authenticate the current user.
     *
     * @return \RainLab\User\Models\User
     */
    public function authenticate()
    {
        // grab the user details
        $socialite = Socialite::driver($this->driver)->user();
        
        // if no email address is available, see if we can request it
        $email = $socialite->email ?: (new EmailRequest)->get($this->driver, $socialite);

        // get our user details and log them in
        $user = $this->getUser($email, $socialite);
        Auth::login($user);

        return $user;
    }

    /**
     * Find or create a new user.
     *
     * @param  string                       $email
     * @param  \Laravel\Socialite\Two\User  $socialite
     * @return \RainLab\User\Model\User
     */
    protected function getUser($email, SocialiteUser $socialite)
    {
        // look up our user by email
        $user = RainLabUser::firstOrNew(['email' => $email]);

        // if the user doesn't exist, create a new one
        if (! $user->exists) {
            $user->name = $socialite->name;
            $user->password = str_random(40);

            $nickname = $socialite->getNickname();

            if ($nickname) {
                $user->username = $nickname;
            }

            // @todo: make activation logic configurable
            $user->is_activated = true;
            $user->activated_at = Carbon::now();
        }

        return $user;
    }

    /**
     * Set the Socialite driver.
     *
     * @param string
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;
    }
}
