<?php

return [
    'name' => 'WIC APL Checker',
    'manifest' => [
        'name' => env('APP_NAME', 'WIC APL Checker'),
        'short_name' => 'WIC APL Checker',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/icon-72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/images/icons/icon-96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/images/icons/icon-142.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/images/icons/icon-150.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/images/icons/icon-200.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/images/icons/icon-300.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/images/icons/icon-388.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/icons/icon-600.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/splash-620.png',
            '750x1334' => '/images/icons/splash-775.png',
            '828x1792' => '/images/icons/splash-930.png',
            '1125x2436' => '/images/icons/splash-1240.png',
            '1242x2208' => '/images/icons/splash-2480.png',

        ],
        'shortcuts' => [
            [
                'name' => 'WIC APL Checker',
                'description' => 'WIC APL Checker',
                'url' => '/',
                'icons' => [
                    "src" => "/images/icons/icon-72.png",
                    "purpose" => "any"
                ]
            ],

        ],
        'custom' => []
    ]
];
