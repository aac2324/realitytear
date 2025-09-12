@extends('layouts.app')

@section('title', $user->full_name)

@section('content')
    <h1>{{ $user->full_name }}</h1>

    <p><strong>Email:</strong> {{ $user->email }}</p>

    <h2>Reviews</h2>
    <ul>
        @foreach($user->reviews as $review)
            <li>
                ⭐ {{ $review->rating }} – {{ $review->comment ?? 'Kein Kommentar' }}
                <br>
                Event: <a href="{{ route('events.show', $review->event->id) }}">{{ $review->event->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
