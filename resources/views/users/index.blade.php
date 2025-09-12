@extends('layouts.app')

@section('title', 'Alle Nutzer')

@section('content')
    <h1>Alle Nutzer</h1>

    <ul>
        @foreach($users as $user)
            <li>
                <a href="{{ route('users.show', $user->id) }}">
                    {{ $user->full_name }}
                </a> – {{ $user->email }}  
                ({{ $user->reviews_count }} Reviews)
            </li>
        @endforeach
    </ul>
@endsection
