<!DOCTYPE html>
<html>
<head>
    <title>Reviews</title>
</head>
<body>
    <h1>Alle Reviews</h1>

    <ul>
        @foreach($reviews as $review)
            <li>
                ⭐ {{ $review->rating }}
                – {{ Str::limit($review->comment, 50, '...') }}
                <br>
                Event: <a href="{{ route('events.show', $review->event->id) }}">{{ $review->event->title }}</a>
                <br>
                User: {{ $review->user->full_name }}
                <br>
                <a href="{{ route('reviews.show', $review->id) }}">Details ansehen</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
