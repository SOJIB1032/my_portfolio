@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-6">
  <h1 class="text-2xl font-bold">Messages</h1>
</div>

@if($messages->isEmpty())
  <div class="text-slate-400">No messages yet.</div>
@else
  <div class="space-y-3">
    @foreach($messages as $m)
      <div class="bg-white p-4 rounded-xl shadow-sm {{ $m->read ? '' : 'ring-1 ring-indigo-200' }}">
        <div class="flex justify-between items-start gap-4">
          <div>
            <div class="font-semibold">{{ $m->name }} <span class="text-xs text-slate-400 font-normal">&lt;{{ $m->email }}&gt;</span></div>
            @if($m->subject)<div class="text-sm text-slate-500">{{ $m->subject }}</div>@endif
            <div class="text-xs text-slate-400 mt-1">{{ $m->created_at->format('d M Y, h:i A') }}</div>
            <p class="mt-2 text-slate-700 text-sm">{{ $m->message }}</p>
          </div>

          <div class="flex flex-col items-end gap-2 shrink-0">
            <span class="text-xs px-2 py-1 rounded-full {{ $m->read ? 'bg-slate-100 text-slate-500' : 'bg-indigo-100 text-indigo-600' }}">
              {{ $m->read ? 'Read' : 'Unread' }}
            </span>
            @if(!$m->read)
              <form method="POST" action="{{ route('admin.messages.read', $m->id) }}">
                @csrf
                <button class="text-xs px-3 py-1 bg-indigo-600 text-white rounded-lg">Mark read</button>
              </form>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endif
@endsection
