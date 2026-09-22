@extends('layouts.admin')

@section('content')
<div class="max-w-md">
  <h1 class="text-2xl font-bold mb-6">Add Skill</h1>

  <form method="POST" action="{{ route('admin.skills.store') }}" class="bg-white p-6 rounded-2xl shadow-sm space-y-4">
    @csrf
    <div>
      <label class="text-sm font-medium text-slate-600">Skill Name</label>
      <input name="name" value="{{ old('name') }}" placeholder="e.g. Laravel" class="w-full mt-1 border p-3 rounded-xl" required />
    </div>
    <div>
      <label class="text-sm font-medium text-slate-600">Proficiency Level (0-100)</label>
      <input type="number" name="level" min="0" max="100" value="{{ old('level', 80) }}" class="w-full mt-1 border p-3 rounded-xl" required />
    </div>
    <div class="flex justify-end gap-2 pt-2">
      <a href="{{ route('admin.skills.index') }}" class="px-4 py-2 border rounded-xl">Cancel</a>
      <button class="px-4 py-2 bg-indigo-600 text-white rounded-xl">Save</button>
    </div>
  </form>
</div>
@endsection
