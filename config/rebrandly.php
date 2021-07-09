<?php

return [
    /*
    |--------------------------------------------------------------------------
    | API key
    |--------------------------------------------------------------------------
    |
    | Enter here your API key generated from: https://app.rebrandly.com/account/api-keys
    | 
    */

    'apikey' => env('REBRANDLY_API_KEY', ''),

    'api_base_url' => env('REBRANDLY_API_BASE_URL', 'https://api.rebrandly.com/'),

    'api_version' => env('REBRANDLY_API_VERSION', 'v1'),
];