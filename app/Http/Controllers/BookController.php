<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;
use Laravel\Fortify\Features;

class BookController extends Controller
{
    public function index(Request $request): Response
    {
        $validated = $request->validate([
            'q' => 'string|max:255',
            'maxResults' => 'integer|min:1|max:40',
            'orderBy' => 'in:relevance,newest',
            'printType' => 'in:all,books,magazines',
            'subject' => 'string|max:100',
        ]);

        $query = $validated['q'] ?? 'Laravel';
        $maxResults = $validated['maxResults'] ?? config('books.search.default_results', 20);
        $orderBy = $validated['orderBy'] ?? config('books.search.default_order', 'relevance');
        
        $params = [
            'q' => $query,
            'maxResults' => $maxResults,
            'orderBy' => $orderBy,
        ];
        
        if (isset($validated['printType'])) {
            $params['printType'] = $validated['printType'];
        }

        if (isset($validated['subject'])) {
            $params['q'] = $query . '+subject:' . $validated['subject'];
        }
        
        $baseUrl = config('books.api.base_url', 'https://www.googleapis.com/books/v1');
        $response = Http::timeout(config('books.api.timeout', 30))
            ->withoutVerifying()
            ->get("{$baseUrl}/volumes", $params);
        
        $books = $response->json();
        
        return Inertia::render('Books', [
            'books' => $books['items'] ?? [],
            'totalItems' => $books['totalItems'] ?? 0,
            'query' => $query,
            'canRegister' => Features::enabled(Features::registration()),
        ]);
    }
    
    public function show(string $id): Response
    {
        $baseUrl = config('books.api.base_url', 'https://www.googleapis.com/books/v1');
        $response = Http::timeout(config('books.api.timeout', 30))
            ->withoutVerifying()
            ->get("{$baseUrl}/volumes/{$id}");
        
        return Inertia::render('Show', [
            'book' => $response->json(),
            'canRegister' => Features::enabled(Features::registration()),
        ]);
    }
}