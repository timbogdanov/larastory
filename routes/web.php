<?php

use Illuminate\Support\Facades\Route;
use Larastory\Http\Controllers\LarastoryController;

/*
|--------------------------------------------------------------------------
| Larastory Routes
|--------------------------------------------------------------------------
*/

// Debug route - remove this later
Route::get('/debug', function () {
    return response()->json([
        'host' => request()->getHost(),
        'domain' => request()->getHttpHost(),
        'url' => request()->url(),
        'subdomain' => request()->getHost(),
    ]);
});

Route::get('/', [LarastoryController::class, 'index'])->name('larastory.index');

Route::get('/component/{component}', [LarastoryController::class, 'component'])->name('larastory.component');

// API routes for component data (for future AJAX functionality)
Route::prefix('api')->group(function () {
    Route::get('/components', [LarastoryController::class, 'listComponents'])->name('larastory.api.components');
    Route::get('/component/{component}/stories', [LarastoryController::class, 'getStories'])->name('larastory.api.stories');
});