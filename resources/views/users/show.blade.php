<!DOCTYPE html>
<html>
<head>
    <title>{{ $user->full_name }}</title>
</head>
<body>
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

    <p><a href="{{ route('users.index') }}">← zurück zur Übersicht</a></p>
</body>
</html>
