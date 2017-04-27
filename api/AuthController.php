<?php namespace Bedard\Socialite\Api;

use Auth;
use Event;
use Response;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    /**
     * Return the current user.
     *
     * @return null|RainLab\User\Models\User
     */
    public function index()
    {
        if (! Auth::check()) {
            return null;
        }

        return Auth::getUser();
    }

    /**
     * Authenticate a user.
     *
     * @return mixed
     */
    public function login()
    {
        $credentials = [
            'login' => input('login'),
            'password' => input('password'),
        ];

        Event::fire('rainlab.user.beforeAuthenticate', [$this, $credentials]);

        return Auth::authenticate($credentials, true);
    }

    /**
     * Log the user out
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();

        return Response::make('Success', 200);
    }
}
