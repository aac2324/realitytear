<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

// Test-Route
Route::get('/ping', function () {
    return 'pong';
});


// Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');


// Hosts
Route::get('/hosts', [HostController::class, 'index'])->name('hosts.index');
Route::get('/hosts/{id}', [HostController::class, 'show'])->name('hosts.show');

// Reviews
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/{id}', [ReviewController::class, 'show'])->name('reviews.show');

// Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

