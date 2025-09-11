<?php

namespace App\Http\Controllers;

use App\Models\Participation;

class ParticipationController extends Controller
{
    public function index()
    {
        return Participation::with(['user', 'event'])->get();
    }

    public function show($id)
    {
        return Participation::with(['user', 'event'])->findOrFail($id);
    }
}
