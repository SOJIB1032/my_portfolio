@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-6">
  <h1 class="text-2xl font-bold">Education</h1>
  <a href="{{ route('admin.education.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-medium">+ Add Education</a>
</div>

<div class="space-y-3">
  @forelse($items as $item)
    <div class="bg-white p-4 rounded-2xl shadow-sm flex items-center justify-between">
      <div>
        <div class="font-semibold">{{ $item->degree }}</div>
        <div class="text-sm text-slate-500">
         {{ $item->institution }} @if($item->group) · {{ $item->group }} @endif · {{ $item->start_year }} — {{ $item->end_year ?? 'Present' }}
        </div>
      </div>
      <div class="flex gap-2">
        <a href="{{ route('admin.education.edit', $item) }}" class="px-3 py-1 border rounded-lg text-sm">Edit</a>
        <form action="{{ route('admin.education.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete?')">
          @csrf @method('DELETE')
          <button class="px-3 py-1 border border-red-200 text-red-600 rounded-lg text-sm">Delete</button>
        </form>
      </div>
    </div>
  @empty
    <div class="text-slate-400 bg-white p-6 rounded-2xl shadow-sm text-center">No education entries yet.</div>
  @endforelse
</div>
@endsection
