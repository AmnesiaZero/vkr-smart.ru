<?php
return [
    'expires_At' => env('JWT_EXP', 50000000),
    'api_key' => env('API_KEY'),
    'alg' => 'HS256'
];
