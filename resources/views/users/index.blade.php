<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <h1>Alle Nutzer</h1>

    <ul>
        @foreach($users as $user)
            <li>
                <a href="{{ route('users.show', $user->id) }}">
                    {{ $user->full_name }}
                </a>
                – {{ $user->email }}
                – {{ $user->reviews_count }} Reviews
            </li>
        @endforeach
    </ul>
</body>
</html>
