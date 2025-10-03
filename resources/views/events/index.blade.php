<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
</head>
<body>
    <h1>Alle Events</h1>

    @if(empty($events))
        <p>Keine Events vorhanden.</p>
    @else
        <ul>
            @foreach ($events as $event)
                <li>
                    <a href="{{ route('events.show', $event->id ?? '') }}">
                        {{ $event->title }}
                    </a> – {{ $event->location }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
