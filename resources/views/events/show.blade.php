@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <h1>{{ $event->title }}</h1>
    <p><strong>Ort:</strong> {{ $event->location }}</p>
    <p><strong>Datum:</strong> {{ $event->starts_at }}</p>
    <p>{{ $event->description }}</p>

    <a href="{{ route('events.index') }}">← zurück zur Übersicht</a>
@endsection
