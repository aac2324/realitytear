<?php

namespace App\Http\Controllers;

use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        return Review::with(['user', 'event'])->get();
    }

    public function show($id)
    {
        return Review::with(['user', 'event'])->findOrFail($id);
    }
}
