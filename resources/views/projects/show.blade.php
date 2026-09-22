@extends('layouts.app')

@section('content')
<a href="{{ route('home') }}#projects" class="text-sm text-indigo-600">&larr; Back to projects</a>

<div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm mt-4">
  <div class="grid md:grid-cols-3 gap-8">
    <div class="md:col-span-2">
      <h1 class="text-2xl md:text-3xl font-bold">{{ $project->title }}</h1>
      <p class="text-slate-500 mt-2">{{ $project->short_description }}</p>

      <div class="mt-6 prose prose-sm md:prose-base max-w-none text-slate-700">
        {!! nl2br(e($project->description)) !!}
      </div>

      <div class="mt-8 flex gap-3">
        @if($project->github_url)
          <a href="{{ $project->github_url }}" target="_blank" class="px-4 py-2 bg-slate-900 text-white rounded-xl text-sm">View on GitHub</a>
        @endif
        @if($project->project_url)
          <a href="{{ $project->project_url }}" target="_blank" class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm">Live Demo</a>
        @endif
      </div>
    </div>

    <div>
      <div class="h-56 md:h-64 w-full rounded-2xl overflow-hidden bg-slate-100 flex items-center justify-center">
        @if($project->thumbnail)
          <img src="{{ asset($project->thumbnail) }}" class="w-full h-full object-cover" alt="{{ $project->title }}" />
        @else
          <span class="text-slate-400 text-sm">No image</span>
        @endif
      </div>
      <div class="mt-4 text-sm text-slate-400">Added {{ $project->created_at->format('M Y') }}</div>
    </div>
  </div>
</div>
@endsection
