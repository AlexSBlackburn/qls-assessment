<?php

use App\Enums\ProductCombination;

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'qls' => [
        'api' => [
            'url' => env('QLS_API_URL'),
            'user' => env('QLS_API_USER'),
            'password' => env('QLS_API_PASSWORD'),
        ],
        'company' => [
            'id' => env('QLS_COMPANY_ID'),
        ],
        'brand' => [
            'id' => env('QLS_BRAND_ID'),
        ],
        'product_combination' => ProductCombination::DHL,
    ],

];
