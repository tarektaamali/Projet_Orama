<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'fcm' => [
        'key' => 'AAAAsQ0FGUQ:APA91bE8DQk-dUVu9DbD5JBoJ98vnL1lZFw7QbRPKqYa2XMDVTbGZXy-sVZ_Dvj9Z0bygbVF_cVPj5zatr7teRUmr3gfAbtKyJHZ-EJ8O78JpntdFTlKuAdrtyC1zBv--g1ITG8BHpS7
'
    ]

];
