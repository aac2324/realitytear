<?php

namespace App\Http\Controllers;

use App\Models\Host;

class HostController extends Controller
{
    public function index()
    {
        $hosts = Host::with('events.reviews')->get();
        return view('hosts.index', compact('hosts')); // ← wichtig!
    }

    public function show($id)
    {
        $host = Host::with('events.reviews')->findOrFail($id);
        return view('hosts.show', compact('host')); // ← wichtig!
    }
}

