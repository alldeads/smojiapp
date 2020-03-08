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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'stripe' => [
        'secret' => env('STRIPE_API_KEY'),
        //'secret' => 'sk_test_kgpdXfhiCx7W7vCadIJVcHQk00UnpVuwpE',
    ],

    'stripe_api_key'=>'sk_live_8wck0LAh4eUBY6X8ObHlXoCG00tD7zM4CO',
    'stripe_publishable_key'=>'pk_live_9O7d1NjvAmL4RAKCZY6wWC2s00iS9ktQ2Z'

    /*'stripe_api_key'=>'sk_test_kgpdXfhiCx7W7vCadIJVcHQk00UnpVuwpE',
    'stripe_publishable_key'=>'pk_test_2CVw6oplsaF651xyXwKfzHTA00mV7dvM62'*/


];
