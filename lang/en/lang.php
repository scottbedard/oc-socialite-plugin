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
            'callback' => 'Callback URL',
            'copy_callback' => 'Copy to clipboard',
            'copy_failed' => 'Your browser prevented copying the callback url.',
            'copy_success' => 'The callback url has been copied to your clipboard.',
            'is_enabled_comment' => 'Turning this off will disable all third-party authentication.',
            'is_enabled' => 'Socialite authentication',
            'use_default' => 'Use default callback',
        ],
        'facebook' => [
            'is_enabled_comment' => 'Turning this off will disable authentication with Facebook.',
            'is_enabled' => 'Facebook authentication',
            'id' => 'App ID',
            'secret' => 'App Secret',
            'tab' => 'Facebook',
        ],
        'github' => [
            'id' => 'Client ID',
            'is_enabled_comment' => 'Turning this off will disable authentication with Google.',
            'is_enabled' => 'GitHub authentication',
            'secret' => 'Client secret',
            'tab' => 'GitHub',
        ],
        'google' => [
            'id' => 'Client ID',
            'is_enabled_comment' => 'Turning this off will disable authentication with Google.',
            'is_enabled' => 'Google authentication',
            'secret' => 'Client secret',
            'tab' => 'Google',
        ],
        'twitter' => [
            'id' => 'Consumer Key (API Key)',
            'is_enabled_comment' => 'Turning this off will disable authentication with Twitter.',
            'is_enabled' => 'Twitter authentication',
            'secret' => 'Consumer Secret (API Secret)',
            'tab' => 'Twitter',
        ],
    ],
];
