<?php

use Illuminate\Support\Facades\Http;

test('book search page is displayed', function () {
    Http::fake([
        '*googleapis.com/*' => Http::response([
            'items' => [],
            'totalItems' => 0,
        ], 200),
    ]);

    $response = $this->get(route('books.index'));

    $response->assertOk();
    $response->assertInertia(fn ($page) => $page
        ->component('Books')
        ->has('books')
        ->has('query')
        ->has('canRegister')
    );
});

test('book search returns results from Google Books API', function () {
    Http::fake([
        '*googleapis.com/*' => Http::response([
            'items' => [
                [
                    'id' => 'test-book-1',
                    'volumeInfo' => [
                        'title' => 'Laravel Testing Guide',
                        'authors' => ['John Doe'],
                        'publishedDate' => '2024-01-01',
                    ],
                ],
            ],
            'totalItems' => 1,
        ], 200),
    ]);

    $response = $this->get(route('books.index', ['q' => 'Laravel']));

    $response->assertOk();
    $response->assertInertia(fn ($page) => $page
        ->component('Books')
        ->where('query', 'Laravel')
        ->has('books', 1)
        ->where('books.0.volumeInfo.title', 'Laravel Testing Guide')
    );
});

test('book search validates input parameters', function () {
    Http::fake();

    $response = $this->get(route('books.index', [
        'maxResults' => 50,
    ]));

    $response->assertSessionHasErrors(['maxResults']);
});

test('book search accepts valid filters', function () {
    Http::fake([
        '*googleapis.com/*' => Http::response([
            'items' => [],
            'totalItems' => 0,
        ], 200),
    ]);

    $response = $this->get(route('books.index', [
        'q' => 'Laravel',
        'maxResults' => 20,
        'orderBy' => 'newest',
        'printType' => 'books',
        'subject' => 'technology',
    ]));

    $response->assertOk();
});

test('book detail page displays book information', function () {
    Http::fake([
        '*googleapis.com/*' => Http::response([
            'id' => 'test-book-1',
            'volumeInfo' => [
                'title' => 'Laravel Testing Guide',
                'authors' => ['John Doe'],
                'description' => 'A comprehensive guide to testing in Laravel',
                'publishedDate' => '2024-01-01',
                'pageCount' => 300,
            ],
        ], 200),
    ]);

    $response = $this->get(route('books.show', ['id' => 'test-book-1']));

    $response->assertOk();
    $response->assertInertia(fn ($page) => $page
        ->component('Show')
        ->has('book')
        ->has('canRegister')
    );
});

test('book search handles API timeouts gracefully', function () {
    Http::fake([
        '*googleapis.com/*' => Http::response(null, 500),
    ]);

    $response = $this->get(route('books.index'));

    $response->assertStatus(200);
});
