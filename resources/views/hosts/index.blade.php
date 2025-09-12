@extends('layouts.app')

@section('title', 'Alle Hosts')

@section('content')
    <h1>Alle Hosts</h1>

    <ul>
        @foreach ($hosts as $host)
            <li>
                <a href="{{ route('hosts.show', $host->id) }}">
                    {{ $host->name }}
                </a> – {{ $host->events->count() }} Events
            </li>
        @endforeach
    </ul>
@endsection

