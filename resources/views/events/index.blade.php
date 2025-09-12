<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
</head>
<body>
    <h1>Alle Events</h1>

    <ul>
        @foreach ($events as $event)
            <li>{{ $event->title }} – {{ $event->starts_at }}</li>
        @endforeach
    </ul>
</body>
</html>
