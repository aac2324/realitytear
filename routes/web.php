<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

// ✅ Debug-Route, um sicher zu prüfen ob web.php geladen wird
Route::get('/debug-routes', function () {
    return 'web.php is active!';
});

// -------------------------
// Events
// -------------------------
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/upload', [EventController::class, 'uploadForm'])->name('events.upload');
Route::post('/events/import', [EventController::class, 'import'])->name('events.import');

// -------------------------
// Hosts
// -------------------------
Route::get('/hosts', [HostController::class, 'index'])->name('hosts.index');
Route::get('/hosts/{id}', [HostController::class, 'show'])->name('hosts.show');

// -------------------------
// Reviews
// -------------------------
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/{id}', [ReviewController::class, 'show'])->name('reviews.show');

// -------------------------
// Users
// -------------------------
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
