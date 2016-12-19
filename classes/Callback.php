<?php namespace Bedard\Socialite\Classes;

use Auth;
use Carbon\Carbon;
use RainLab\User\Models\User;

class Callback
{
    public function authenticate($client)
    {
        $user = User::firstOrNew(['email' => $client->email]);

        if (! $user->exists) {
            $user->name = $client->name;
            $user->password = str_random(40);

            // @todo: make activation logic configurable
            $user->is_activated = true;
            $user->activated_at = Carbon::now();
        }

        Auth::login($user);

        return $user;
    }
}
