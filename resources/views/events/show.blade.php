@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <h1>{{ $event->title }}</h1>

    <p><strong>Ort:</strong> {{ $event->location }}</p>
    <p><strong>Start:</strong> {{ $event->starts_at->format('d.m.Y H:i') }}</p>
    <p><strong>Host:</strong> {{ $event->host->name }}</p>

    <h2>Bewertungen</h2>
    <ul>
        @foreach ($event->reviews as $review)
            <li>
                ⭐ {{ $review->rating }} – {{ $review->comment ?? 'Kein Kommentar' }}
                <br>
                <em>von {{ $review->user->full_name }}</em>
            </li>
        @endforeach
    </ul>
@endsection
