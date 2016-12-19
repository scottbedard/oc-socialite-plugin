<?php

Route::group([
    'prefix' => 'api/bedard/socialite',
    'middleware' => '\Bedard\Socialite\Classes\ApiMiddleware',
], function () {
    Route::any('api/socialite/logout', 'Bedard\Socialite\Api\AuthController@logout');

    //
    // Github
    //
    Route::group([
        'prefix' => 'github',
        'middleware' => '\Bedard\Socialite\Classes\GithubMiddleware',
    ], function() {
        Route::get('callback', 'Bedard\Socialite\Api\GithubController@callback');
        Route::get('redirect', 'Bedard\Socialite\Api\GithubController@redirect');
    });
});
