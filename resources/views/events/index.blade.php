<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
</head>
<body>
    <h1>Alle Events</h1>

    <ul>
        @foreach ($events as $event)
            <li>
                <a href="{{ route('events.show', $event->id) }}">
                    {{ $event->title }}
                </a> – {{ $event->location }}
            </li>
        @endforeach
    </ul>
</body>
</html>
