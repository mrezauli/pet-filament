<?php

// config for DutchCodingCompany/FilamentSocialite
return [
    // Allow login, and registration if enabled, for users with an email for one of the following domains.
    // All domains allowed by default
    'domain_allowlist' => [],

    // Allow registration through socials
    'registration' => true,

    // Specify the providers that should be visible on the login.
    // These should match the socialite providers you have setup in your services.php config.
    // Uses blade UI icons, for example: https://github.com/owenvoke/blade-fontawesome
    'providers' => [
        'facebook' => [
            'label' => 'FaceBook',
            'icon' => 'fab-facebook',
        ],
        'twitter' => [
            'label' => 'Twitter',
            'icon' => 'fab-twitter',
        ]
    ],
];
