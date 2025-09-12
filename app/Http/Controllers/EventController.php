<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function uploadForm()
    {
        return view('events.upload');
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = fopen($request->file('csv_file')->getPathname(), 'r');
        fgetcsv($file); // Header überspringen

        while (($row = fgetcsv($file, 1000, ',')) !== false) {
            Event::create([
                'title'       => $row[0],
                'starts_at'   => $row[1],
                'location'    => $row[2],
                'description' => $row[3] ?? null,
                'host_id'     => $row[4],
            ]);
        }

        fclose($file);

        return redirect()->route('events.index')->with('success', 'Events erfolgreich importiert!');
    }
}
