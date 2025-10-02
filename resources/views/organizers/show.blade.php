@extends('layouts.app')

@section('content')
<h1 class="mb-4">{{ $host->full_name ?? $host->email }}</h1>

<h2 class="font-semibold mb-2">Events</h2>
<ul class="space-y-2">
  @foreach($host->eventsHosted as $event)
    <li class="p-3 border rounded">
      <div class="font-medium">{{ $event->title }}</div>
      <div class="text-sm">
        Avg Rating: {{ number_format($event->average_rating ?? 0, 2) }}
        · Reviews: {{ $event->reviews_count ?? $event->reviews()->count() }}
      </div>
      <a href="{{ route('events.show', $event) }}" class="text-indigo-600 underline">Zum Event</a>
    </li>
  @endforeach
</ul>
@endsection
