<?php

return[
    //
    // Plugin
    //
    'plugin' => [
        'details' => [
            'name' => 'Socialite',
            'description' => 'Socialite API for RainLab.User.',
        ],
        'permissions' => [
            'socialite' => 'Manage Socialite Settings',
        ],
    ],

    //
    // Settings
    //
    'settings' => [
        'label' => 'Socialite settings',
        'description' => 'Manage authentication settings.',
        'facebook' => [
            'is_enabled_comment' => 'Turning this off will disable authentication with Facebook.',
            'is_enabled' => 'Facebook authentication',
            'id' => 'App ID',
            'secret' => 'App Secret',
            'tab' => 'Facebook',
        ],
        'fields' => [
            'is_enabled_comment' => 'Turning this off will disable all third-party authentication.',
            'is_enabled' => 'Socialite authentication',
        ],
    ],
];
