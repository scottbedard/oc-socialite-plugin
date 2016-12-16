<?php namespace Bedard\Socialite\Api;

use Auth;
// use Redirect;
use Response;
// use Socialite;
// use RainLab\User\Models\User;
use Illuminate\Routing\Controller;
// use Laravel\Socialite\Two\InvalidStateException;

class AuthController extends Controller
{

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
