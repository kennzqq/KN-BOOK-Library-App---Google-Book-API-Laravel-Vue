<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return Inertia::render('Home', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
    return Inertia::render('About', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('about');

Route::get('/services', function () {
    return Inertia::render('Services', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('services');

Route::get('/contact', function () {
    return Inertia::render('Contact', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('contact');

Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:5000',
    ]);
    
    // In a production app, you would send an email here:
    // Mail::to('admin@knbook.com')->send(new ContactMessage($validated));
    
    // For now, just log it
    \Illuminate\Support\Facades\Log::info('Contact form submission', $validated);
    
    return back();
})->name('contact.submit');

require __DIR__.'/settings.php';