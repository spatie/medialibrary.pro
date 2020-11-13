<?php

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

    'paddle' => [
        'vendor_id' => env('PADDLE_VENDOR_ID'),
        'product_id_single' => '633977',
        'product_id_unlimited' => '633990',
        'coupon' => [
            'default' => [
                'code' => env('PADDLE_COUPON_CODE'),
                'percentage' => env('PADDLE_COUPON_PERCENTAGE'),
                'valid_from' => env('PADDLE_COUPON_VALID_FROM'), // format Y-m-d H:i
                'expires_at' => env('PADDLE_COUPON_EXPIRES_AT'), // format Y-m-d H:i
                'label' => env('PADDLE_COUPON_LABEL'),
            ],
        ]
    ],

    'mailcoach' => [
        'list_uuid' => env('MAILCOACH_LIST_UUID'),
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'satis' => [
        'license' => env('SATIS_LICENSE'),
    ],

    'ses' => [
        'key' => env('SES_AWS_ACCESS_KEY_ID'),
        'secret' => env('SES_AWS_SECRET_ACCESS_KEY'),
        'region' => env('SES_AWS_DEFAULT_REGION', 'us-east-1'),
    ],
];
