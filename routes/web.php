<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Host;
use App\Models\Event;
use App\Models\Review;
use App\Models\Participation;

// Users
Route::get('/users', function () {
    return User::all();
});

Route::get('/users/{id}', function ($id) {
    return User::with(['reviews', 'participations'])->findOrFail($id);
});

// Hosts
Route::get('/hosts', function () {
    return Host::with('events')->get();
});

Route::get('/hosts/{id}', function ($id) {
    return Host::with('events')->findOrFail($id);
});

// Events
Route::get('/events', function () {
    return Event::with(['host', 'reviews.user', 'participations.user'])->get();
});

Route::get('/events/{id}', function ($id) {
    return Event::with(['host', 'reviews.user', 'participations.user'])->findOrFail($id);
});

// Reviews
Route::get('/reviews', function () {
    return Review::with(['user', 'event'])->get();
});

Route::get('/reviews/{id}', function ($id) {
    return Review::with(['user', 'event'])->findOrFail($id);
});

// Participations
Route::get('/participations', function () {
    return Participation::with(['user', 'event'])->get();
});

Route::get('/participations/{id}', function ($id) {
    return Participation::with(['user', 'event'])->findOrFail($id);
});
