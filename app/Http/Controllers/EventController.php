<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return Event::with(['host', 'reviews.user', 'participations.user'])->get();
    }

    public function show($id)
    {
        return Event::with(['host', 'reviews.user', 'participations.user'])->findOrFail($id);
    }
}
