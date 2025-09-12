<?php

namespace App\Http\Controllers;

use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'event'])->get();
        return view('reviews.index', compact('reviews'));
    }

    public function show($id)
    {
        $review = Review::with(['user', 'event'])->findOrFail($id);
        return view('reviews.show', compact('review'));
    }
}
