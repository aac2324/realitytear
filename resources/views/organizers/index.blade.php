@extends('layouts.app')

@section('content')
<h1 class="mb-4">Hosts</h1>

<div class="grid md:grid-cols-3 gap-4">
  @forelse($hosts as $host)
    <a href="{{ route('organizers.show', $host) }}" class="block p-4 border rounded">
      <div class="font-semibold">{{ $host->full_name ?? $host->email }}</div>
      <div class="text-sm text-gray-600">Events: {{ $host->events_count }}</div>
    </a>
  @empty
    <p>Keine Hosts gefunden.</p>
  @endforelse
</div>

<div class="mt-4">{{ $hosts->links() }}</div>
@endsection
