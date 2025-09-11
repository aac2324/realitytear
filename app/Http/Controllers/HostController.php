<?php

namespace App\Http\Controllers;

use App\Models\Host;

class HostController extends Controller
{
    public function index()
    {
        return Host::with('events')->get();
    }

    public function show($id)
    {
        return Host::with('events')->findOrFail($id);
    }
}
