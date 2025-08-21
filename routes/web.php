<?php

use Illuminate\Support\Facades\Route;
use Larastory\Http\Controllers\LarastoryController;

/*
|--------------------------------------------------------------------------
| Larastory Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the LarastoryServiceProvider and will be
| assigned to the configured subdomain group. They provide the main
| interface for browsing and viewing components.
|
*/

Route::get('/', [LarastoryController::class, 'index'])->name('larastory.index');

Route::get('/component/{component}', [LarastoryController::class, 'component'])->name('larastory.component');

// API routes for component data
Route::prefix('api')->group(function () {
    Route::get('/components', [LarastoryController::class, 'listComponents'])->name('larastory.api.components');
    Route::get('/component/{component}/stories', [LarastoryController::class, 'getStories'])->name('larastory.api.stories');
});