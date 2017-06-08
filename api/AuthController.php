<?php namespace Bedard\Socialite\Api;

use Auth;
use Event;
use Illuminate\Routing\Controller;
use October\Rain\Exception\ValidationException;
use RainLab\User\Models\User;
use Response;

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

    /**
     * Create a user.
     *
     * @return RainLab\User\Models\User
     */
    public function store()
    {
        // make sure the user doesn't already exist
        if (User::whereEmail(input('email'))->exists()) {
            return Response::make([
                'error' => 'A user already exists with that email address.',
            ], 500);
        }

        // create our new user
        try {
            $user = new User(input());
            $user->save();
        } catch (ValidationException $e) {
            return Response::make([
                'error' => $e->getMessage(),
                'fields' => $e->getFields(),
            ], 500);
        }

        // return our new user
        return User::findOrFail($user->id);
    }
}
