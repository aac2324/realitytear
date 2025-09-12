@extends('layouts.app')

@section('title', 'Events Upload')

@section('content')
    <h1>Events CSV hochladen</h1>

    <form action="{{ route('events.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file" accept=".csv" required>
        <button type="submit">Upload & Import</button>
    </form>
@endsection
