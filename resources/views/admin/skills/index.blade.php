@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-6">
  <h1 class="text-2xl font-bold">Skills</h1>
  <a href="{{ route('admin.skills.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-medium">+ Add Skill</a>
</div>

<div class="grid md:grid-cols-2 gap-3">
  @forelse($items as $item)
    <div class="bg-white p-4 rounded-2xl shadow-sm">
      <div class="flex items-center justify-between">
        <div class="font-semibold">{{ $item->name }}</div>
        <div class="flex gap-2">
          <a href="{{ route('admin.skills.edit', $item) }}" class="px-3 py-1 border rounded-lg text-sm">Edit</a>
          <form action="{{ route('admin.skills.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete?')">
            @csrf @method('DELETE')
            <button class="px-3 py-1 border border-red-200 text-red-600 rounded-lg text-sm">Delete</button>
          </form>
        </div>
      </div>
      <div class="mt-3 h-2 bg-slate-100 rounded-full overflow-hidden">
        <div class="h-full bg-indigo-600" style="width: {{ $item->level }}%"></div>
      </div>
      <div class="text-xs text-slate-400 mt-1">{{ $item->level }}%</div>
    </div>
  @empty
    <div class="text-slate-400 bg-white p-6 rounded-2xl shadow-sm text-center md:col-span-2">No skills yet.</div>
  @endforelse
</div>
@endsection
