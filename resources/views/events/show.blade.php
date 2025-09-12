@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <h1>{{ $event->title }}</h1>
    <p><strong>Ort:</strong> {{ $event->location }}</p>
    <p><strong>Start:</strong> {{ $event->starts_at }}</p>
    <p><strong>Beschreibung:</strong> {{ $event->description }}</p>
@endsection
