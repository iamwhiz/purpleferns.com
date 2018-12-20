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
     'twitter' => [
        'client_id'     => env('TWITTER_ID','TlvXFdVlTHD5jhu9aeuBiUZE8'),
        'client_secret' => env('TWITTER_SECRET','m95h9iFHvHVE10VXISsAE093rQVnhsuNTIpTWyCSsih8BqyU8A'),
        'redirect'      => env('TWITTER_URL','https://purpleferns.com/twitter/callback'),
    ],
   

     'facebook' => [
        'client_id'     => env('FACEBOOK_ID','324327418178474'),
        'client_secret' => env('FACEBOOK_SECRET','68dc8606eeffd9fefa18b363f36db521'),
        'redirect'      => env('FACEBOOK_URL','https://purpleferns.com/facebook/facebook/callback'),
    ],

    'google' => [
        'client_id'     => env('GOOGLE_ID','250816181560-fnjr5ohlic8kvl48ckap4kta2t1lddsd.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_SECRET','d9Bc6g1YwVmx8IfUM95xcqdO'),
        'redirect'      => env('GOOGLE_URL','https://purpleferns.com/google/google/callback'),
    ],

];
