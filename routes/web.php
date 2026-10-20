<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('documents', DocumentController::class);
    Route::get('/documents-search', [DocumentController::class, 'search'])->name('documents.search');
});

require __DIR__.'/auth.php';