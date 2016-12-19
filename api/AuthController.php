<?php namespace Bedard\Socialite\Api;

use Auth;
use Response;
use Illuminate\Routing\Controller;

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
