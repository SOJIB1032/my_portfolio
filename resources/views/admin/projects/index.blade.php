@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-6">
  <h1 class="text-2xl font-bold">Projects</h1>
  <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-medium">+ New Project</a>
</div>

<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
  <table class="w-full text-sm">
    <thead class="bg-slate-50 text-left text-slate-500">
      <tr>
        <th class="px-4 py-3">Title</th>
        <th class="px-4 py-3">Published</th>
        <th class="px-4 py-3">Created</th>
        <th class="px-4 py-3 text-right">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse($projects as $p)
      <tr class="border-t">
        <td class="px-4 py-3 font-medium">{{ $p->title }}</td>
        <td class="px-4 py-3">
          <span class="text-xs px-2 py-1 rounded-full {{ $p->published ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-500' }}">
            {{ $p->published ? 'Published' : 'Draft' }}
          </span>
        </td>
        <td class="px-4 py-3 text-slate-400">{{ $p->created_at->format('d M Y') }}</td>
        <td class="px-4 py-3 text-right space-x-2">
          <a href="{{ route('admin.projects.edit', $p) }}" class="px-3 py-1 border rounded-lg">Edit</a>
          <form action="{{ route('admin.projects.destroy', $p) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this project?')">
            @csrf @method('DELETE')
            <button class="px-3 py-1 border border-red-200 text-red-600 rounded-lg">Delete</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="4" class="px-4 py-6 text-center text-slate-400">No projects yet.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="mt-4">{{ $projects->links() }}</div>
@endsection
