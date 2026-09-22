@extends('layouts.admin')

@section('content')
<div class="max-w-2xl">
  <h1 class="text-2xl font-bold mb-6">New Project</h1>

  <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow-sm space-y-4">
    @csrf

    <div>
      <label class="text-sm font-medium text-slate-600">Title</label>
      <input name="title" value="{{ old('title') }}" class="w-full mt-1 border p-3 rounded-xl" required />
    </div>

    <div>
      <label class="text-sm font-medium text-slate-600">Short description</label>
      <input name="short_description" value="{{ old('short_description') }}" class="w-full mt-1 border p-3 rounded-xl" />
    </div>

    <div>
      <label class="text-sm font-medium text-slate-600">Full description</label>
      <textarea name="description" rows="6" class="w-full mt-1 border p-3 rounded-xl">{{ old('description') }}</textarea>
    </div>

    <div>
      <label class="text-sm font-medium text-slate-600">Thumbnail image</label>
      <input type="file" name="thumbnail" class="w-full mt-1 border p-2 rounded-xl" />
    </div>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-medium text-slate-600">Live URL</label>
        <input name="project_url" value="{{ old('project_url') }}" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
      <div>
        <label class="text-sm font-medium text-slate-600">GitHub URL</label>
        <input name="github_url" value="{{ old('github_url') }}" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
    </div>

    <label class="inline-flex items-center gap-2 text-sm">
      <input type="checkbox" name="published" value="1" {{ old('published', true) ? 'checked' : '' }}> Published (visible on site)
    </label>

    <div class="flex justify-end gap-2 pt-2">
      <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 border rounded-xl">Cancel</a>
      <button class="px-4 py-2 bg-indigo-600 text-white rounded-xl">Save Project</button>
    </div>
  </form>
</div>
@endsection
