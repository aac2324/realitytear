@extends('layouts.app')

@section('title', $host->name)

@section('content')
    <h1>{{ $host->name }}</h1>

    <h2>Events</h2>
    <ul>
        @foreach ($host->events as $event)
            <li>
                <a href="{{ route('events.show', $event->id) }}">
                    {{ $event->title }}
                </a> – {{ $event->reviews->count() }} Reviews
            </li>
        @endforeach
    </ul>
@endsection
