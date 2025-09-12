<!DOCTYPE html>
<html>
<head>
    <title>{{ $host->name }}</title>
</head>
<body>
    <h1>Host: {{ $host->name }}</h1>

    <h2>Events</h2>
    <ul>
        @foreach ($host->events as $event)
            <li>
                <a href="{{ route('events.show', $event->id) }}">
                    {{ $event->title }}
                </a>
                – {{ $event->reviews->count() }} Bewertungen
            </li>
        @endforeach
    </ul>

    <p><a href="{{ route('hosts.index') }}">← zurück zur Übersicht</a></p>
</body>
</html>

