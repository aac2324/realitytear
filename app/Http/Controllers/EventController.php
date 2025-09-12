<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['host', 'reviews.user', 'participations.user'])->get();
        return view('events.index', compact('events'));    }

    public function show($id)
    {
    $event = Event::with(['host', 'reviews.user', 'participations.user'])->findOrFail($id);
    return view('events.show', compact('event'));
    }

}
