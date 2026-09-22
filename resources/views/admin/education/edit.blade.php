@extends('layouts.admin')

@section('content')
<div class="max-w-xl">
  <h1 class="text-2xl font-bold mb-6">Edit Education</h1>

  <form method="POST" action="{{ route('admin.education.update', $education) }}" class="bg-white p-6 rounded-2xl shadow-sm space-y-4">
    @csrf @method('PUT')
    <div>
      <label class="text-sm font-medium text-slate-600">Degree</label>
      <input name="degree" value="{{ old('degree', $education->degree) }}" class="w-full mt-1 border p-3 rounded-xl" required />
    </div>
    <div>
      <label class="text-sm font-medium text-slate-600">Institution</label>
      <input name="institution" value="{{ old('institution', $education->institution) }}" class="w-full mt-1 border p-3 rounded-xl" required />
    </div>
    <div>
      <label class="text-sm font-medium text-slate-600">Group</label>
      <input name="group" value="{{ old('group', $education->group) }}" class="w-full mt-1 border p-3 rounded-xl" required />
    </div>
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-medium text-slate-600">Start Year</label>
        <input name="start_year" value="{{ old('start_year', $education->start_year) }}" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
      <div>
        <label class="text-sm font-medium text-slate-600">End Year</label>
        <input name="end_year" value="{{ old('end_year', $education->end_year) }}" placeholder="Present" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
    </div>
    <div>
      <label class="text-sm font-medium text-slate-600">Description (optional)</label>
      <textarea name="description" rows="3" class="w-full mt-1 border p-3 rounded-xl">{{ old('description', $education->description) }}</textarea>
    </div>
    <div class="flex justify-end gap-2 pt-2">
      <a href="{{ route('admin.education.index') }}" class="px-4 py-2 border rounded-xl">Cancel</a>
      <button class="px-4 py-2 bg-indigo-600 text-white rounded-xl">Update</button>
    </div>
  </form>
</div>
@endsection
