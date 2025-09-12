<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    /**
     * Zeigt alle Events
     */
    public function index()
    {
         $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Zeigt ein einzelnes Event
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', compact('event'));
    }
}