<!DOCTYPE html>
<html>
<head>
    <title>Review Details</title>
</head>
<body>
    <h1>Review</h1>

    <p><strong>Bewertung:</strong> ⭐ {{ $review->rating }}</p>
    <p><strong>Kommentar:</strong> {{ $review->comment ?? 'Kein Kommentar' }}</p>

    <p><strong>Event:</strong> 
        <a href="{{ route('events.show', $review->event->id) }}">
            {{ $review->event->title }}
        </a>
    </p>

    <p><strong>User:</strong> {{ $review->user->full_name }} ({{ $review->user->email }})</p>

    <p><a href="{{ route('reviews.index') }}">← back to reviews</a></p>
</body>
</html>
