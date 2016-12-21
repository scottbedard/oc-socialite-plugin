<?php namespace Bedard\Socialite\Classes;

use Auth;
use Bedard\Socialite\Classes\EmailRequest;
use Carbon\Carbon;
use GuzzleHttp;
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
        $socialite = Socialite::driver($this->driver)->user();

        $email = $socialite->email ?: (new EmailRequest)->get($this->driver, $socialite);

        $user = RainLabUser::firstOrNew(['email' => $email]);

        if (! $user->exists) {
            $user->name = $socialite->name;
            $user->password = str_random(40);

            // @todo: make activation logic configurable
            $user->is_activated = true;
            $user->activated_at = Carbon::now();
        }

        Auth::login($user);

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
