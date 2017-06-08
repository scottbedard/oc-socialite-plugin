<?php namespace Bedard\Socialite\Api;

use Auth;
use Event;
use Illuminate\Routing\Controller;
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
        $user = User::firstOrNew(['email' => input('email')]);
        $user->password = input('password');
        $user->password_confirmation = input('passwordConfirmation');

        try {
            $user->save();
        } catch (\Exception $e) {
            return \Response::make($e->getMessage(), 500);
        }
    }
}
