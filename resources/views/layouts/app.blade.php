<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Event Reviews')</title>
</head>
<body>
    <nav>
        <a href="{{ route('events.index') }}">Events</a> |
        <a href="{{ route('organizers.index') }}">Organizers</a> |
        <a href="{{ route('reviews.index') }}">Reviews</a> |
        <a href="{{ route('users.index') }}">Users</a>
    </nav>

    <hr>

    <div>
        @yield('content')
    </div>
</body>
</html>

