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

    'facebook' => [
        'client_id' => "318482052763329",
        'client_secret' => "3d3999e0d3adb1094fcf3e14dd02a72b",
        'redirect' => env('APP_URL', 'https://a2bpublications.com/mcq-test/').'login/facebook/callback',
    ],

    'google' => [
        'client_id' => "327716097335-4ln0fdcc14musofa1q8fung20qedbsu1.apps.googleusercontent.com",
        'client_secret' => "IvpvqVGBVG_NKGopmAgTyWaP",
        'redirect' => env('APP_URL', 'https://a2bpublications.com/mcq-test/').'login/google/callback',
    ],

];
