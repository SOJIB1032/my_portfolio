@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mb-6">
  <h1 class="text-2xl font-bold">Dashboard</h1>
  <div class="text-sm text-slate-500">{{ now()->format('d M Y') }}</div>
</div>

<!-- Stats grid -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
  <a href="{{ route('admin.projects.index') }}" class="bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition">
    <div class="text-2xl font-bold text-indigo-600">{{ $stats['projects'] }}</div>
    <div class="text-xs text-slate-500 mt-1">Projects</div>
  </a>
  <a href="{{ route('admin.education.index') }}" class="bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition">
    <div class="text-2xl font-bold text-indigo-600">{{ $stats['education'] }}</div>
    <div class="text-xs text-slate-500 mt-1">Education</div>
  </a>
  <a href="{{ route('admin.experience.index') }}" class="bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition">
    <div class="text-2xl font-bold text-indigo-600">{{ $stats['experience'] }}</div>
    <div class="text-xs text-slate-500 mt-1">Experience</div>
  </a>
  <a href="{{ route('admin.skills.index') }}" class="bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition">
    <div class="text-2xl font-bold text-indigo-600">{{ $stats['skills'] }}</div>
    <div class="text-xs text-slate-500 mt-1">Skills</div>
  </a>
  <a href="{{ route('admin.achievements.index') }}" class="bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition">
    <div class="text-2xl font-bold text-indigo-600">{{ $stats['achievements'] }}</div>
    <div class="text-xs text-slate-500 mt-1">Achievements</div>
  </a>
  <a href="{{ route('admin.messages') }}" class="bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition">
    <div class="text-2xl font-bold {{ $stats['unread'] > 0 ? 'text-red-600' : 'text-indigo-600' }}">{{ $stats['unread'] }}</div>
    <div class="text-xs text-slate-500 mt-1">Unread Messages</div>
  </a>
</div>

<!-- Recent messages -->
<div class="mt-8">
  <div class="flex items-center justify-between mb-3">
    <h2 class="text-lg font-semibold">Recent Messages</h2>
    <a href="{{ route('admin.messages') }}" class="text-sm text-indigo-600">View all</a>
  </div>

  <div class="space-y-3">
    @forelse($messages as $message)
      <div class="bg-white p-4 rounded-xl shadow-sm flex items-start justify-between gap-4">
        <div>
          <div class="flex items-center gap-2 text-sm">
            <span class="font-semibold">{{ $message->name }}</span>
            <span class="text-slate-400">&lt;{{ $message->email }}&gt;</span>
            @if(!$message->read)
              <span class="text-[10px] px-2 py-0.5 bg-red-100 text-red-600 rounded-full">Unread</span>
            @endif
          </div>
          <p class="mt-1 text-slate-600 text-sm">{{ Str::limit($message->message, 90) }}</p>
        </div>
        <div class="text-xs text-slate-400 whitespace-nowrap">{{ $message->created_at->diffForHumans() }}</div>
      </div>
    @empty
      <div class="text-slate-400 text-sm">No messages yet.</div>
    @endforelse
  </div>
</div>

@endsection
