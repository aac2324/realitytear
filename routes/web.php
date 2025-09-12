<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ParticipationController;

// Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// Hosts
Route::get('/hosts', [HostController::class, 'index'])->name('hosts.index'); //this is an index route
Route::get('/hosts/{id}', [HostController::class, 'show'])->name('hosts.show');

// Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

// Reviews
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/{id}', [ReviewController::class, 'show'])->name('reviews.show');

// Participations
Route::get('/participations', [ParticipationController::class, 'index']);
Route::get('/participations/{id}', [ParticipationController::class, 'show']);

