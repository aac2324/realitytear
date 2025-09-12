@extends('layouts.app')

@section('title', 'Alle Reviews')

@section('content')
    <h1>Alle Reviews</h1>

    <ul>
        @foreach($reviews as $review)
            <li>
                ⭐ {{ $review->rating }}  
                – {{ Str::limit($review->comment, 50, '...') }}  
                <br>
                Event: <a href="{{ route('events.show', $review->event->id) }}">{{ $review->event->title }}</a>  
                User: {{ $review->user->full_name }}  
                <a href="{{ route('reviews.show', $review->id) }}">Details</a>
            </li>
        @endforeach
    </ul>
@endsection

