<?php

Route::group(['middleware' => '\Bedard\Socialite\Classes\ApiMiddleware'], function () {

    Route::any('api/socialite/logout', 'Bedard\Socialite\Api\AuthController@logout');

});
