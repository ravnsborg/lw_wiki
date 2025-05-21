<?php

use Illuminate\Support\Facades\Route;

Route::get('/category/create', \App\Livewire\CreateCategory::class)
    ->middleware(['auth', 'verified'])
    ->name('create-category');

Route::get('/article/create', \App\Livewire\CreateArticle::class)
    ->middleware(['auth', 'verified'])
    ->name('create-article');

Route::get('/article/{article}', \App\Livewire\EditArticle::class)
    ->middleware(['auth', 'verified'])
    ->name('edit-article');

// Authenticated dashboard route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/', 'dashboard');

    Route::view('dashboard', 'dashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->middleware(['auth'])
        ->name('profile');

    //    Route::get('/dashboard', function () {
    //        return view('dashboard');
    //    })->name('dashboard');
    // s
    //    // Example profile routes
    //    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
