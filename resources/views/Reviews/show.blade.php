@extends('layouts.app')

@section('title', 'Review Details')

@section('content')
    <h1>Review</h1>

    <p><strong>Bewertung:</strong> ⭐ {{ $review->rating }}</p>
    <p><strong>Kommentar:</strong> {{ $review->comment ?? 'Kein Kommentar' }}</p>
    <p><strong>Event:</strong> <a href="{{ route('events.show', $review->event->id) }}">{{ $review->event->title }}</a></p>
    <p><strong>User:</strong> {{ $review->user->full_name }}</p>
@endsection

