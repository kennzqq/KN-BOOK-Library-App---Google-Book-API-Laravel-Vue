<?php

return [
    'api' => [
        'key' => env('GOOGLE_BOOKS_API_KEY'),
        'base_url' => env('GOOGLE_BOOKS_BASE_URL', 'https://www.googleapis.com/books/v1'),
        'timeout' => env('GOOGLE_BOOKS_TIMEOUT', 30),
        'verify_ssl' => env('GOOGLE_BOOKS_VERIFY_SSL', true),
    ],

    'search' => [
        'default_results' => 20,
        'max_results' => 40,
        'default_order' => 'relevance',
    ],
];
