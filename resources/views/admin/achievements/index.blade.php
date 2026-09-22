@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-6">
  <h1 class="text-2xl font-bold">Achievements</h1>
  <a href="{{ route('admin.achievements.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-medium">+ Add Achievement</a>
</div>

<div class="grid md:grid-cols-2 gap-3">
  @forelse($items as $item)
    <div class="bg-white p-4 rounded-2xl shadow-sm flex items-start justify-between">
      <div class="flex items-start gap-3">
        <div class="text-2xl">{{ $item->icon }}</div>
        <div>
          <div class="font-semibold">{{ $item->title }}</div>
          <div class="text-sm text-slate-500">{{ $item->issuer }} @if($item->year) — {{ $item->year }} @endif</div>
        </div>
      </div>
      <div class="flex gap-2 shrink-0">
        <a href="{{ route('admin.achievements.edit', $item) }}" class="px-3 py-1 border rounded-lg text-sm">Edit</a>
        <form action="{{ route('admin.achievements.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete?')">
          @csrf @method('DELETE')
          <button class="px-3 py-1 border border-red-200 text-red-600 rounded-lg text-sm">Delete</button>
        </form>
      </div>
    </div>
  @empty
    <div class="text-slate-400 bg-white p-6 rounded-2xl shadow-sm text-center md:col-span-2">No achievements yet.</div>
  @endforelse
</div>
@endsection
