<?php

//
// API
//
Route::group(['prefix' => 'api/bedard/socialite'], function() {
    Route::any('logout', 'Bedard\Socialite\Api\AuthController@logout');

    Route::group(['middleware' => '\Bedard\Socialite\Classes\StandardMiddleware'], function() {
        Route::get('/', 'Bedard\Socialite\Api\AuthController@index');
        Route::post('/', 'Bedard\Socialite\Api\AuthController@store');
        Route::post('/login', 'Bedard\Socialite\Api\AuthController@login');
    });
});

//
// Third party authentication
//
Route::group([
    'prefix' => 'api/bedard/socialite',
    'middleware' => '\Bedard\Socialite\Classes\ApiMiddleware',
], function () {
    //
    // Facebook
    //
    Route::group([
        'prefix' => 'facebook',
        'middleware' => '\Bedard\Socialite\Classes\FacebookMiddleware',
    ], function() {
        Route::get('/', 'Bedard\Socialite\Api\FacebookController@redirect');
        Route::get('callback', 'Bedard\Socialite\Api\FacebookController@callback');
    });

    //
    // GitHub
    //
    Route::group([
        'prefix' => 'github',
        'middleware' => '\Bedard\Socialite\Classes\GithubMiddleware',
    ], function() {
        Route::get('/', 'Bedard\Socialite\Api\GithubController@redirect');
        Route::get('callback', 'Bedard\Socialite\Api\GithubController@callback');
    });

    //
    // Google
    //
    Route::group([
        'prefix' => 'google',
        'middleware' => '\Bedard\Socialite\Classes\GoogleMiddleware',
    ], function() {
        Route::get('/', 'Bedard\Socialite\Api\GoogleController@redirect');
        Route::get('callback', 'Bedard\Socialite\Api\GoogleController@callback');
    });

    //
    // Twitter
    //
    Route::group([
        'prefix' => 'twitter',
        'middleware' => '\Bedard\Socialite\Classes\TwitterMiddleware',
    ], function() {
        Route::get('/', 'Bedard\Socialite\Api\TwitterController@redirect');
        Route::get('callback', 'Bedard\Socialite\Api\TwitterController@callback');
    });
});
