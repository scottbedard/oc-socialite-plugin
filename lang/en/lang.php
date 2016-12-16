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
        'fields' => [
            'is_enabled' => 'Socialite API',
            'is_enabled_comment' => 'Turning this off will disable all third-party authentication.',
        ],
    ],
];
