@extends('layouts.app')

@section('content')

<!-- Hero -->
<section class="grid md:grid-cols-2 gap-10 items-center section-fade">
  <div>
    <div class="text-slate-500">Hi, I'm</div>
    <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
      {{ $profile->name ?? 'Your Name' }} —
      <span class="text-indigo-600">{{ $profile->title ?? 'Your Title' }}</span>
    </h1>
    <p class="mt-4 text-slate-600 max-w-xl">{{ $profile->tagline ?? '' }}</p>

    <div class="mt-6 flex gap-3">
      <a href="#projects" class="touch-btn bg-indigo-600 text-white rounded-2xl px-4 py-2 shadow card-hover">View Projects</a>
      <a href="#contact" class="touch-btn border rounded-2xl px-4 py-2">Contact</a>
      @if(!empty($profile->resume_url))
        <a href="{{ $profile->resume_url }}" target="_blank" class="touch-btn border rounded-2xl px-4 py-2">Resume</a>
      @endif
    </div>

    <div class="mt-6 grid grid-cols-3 gap-3">
      <div class="bg-white p-3 rounded-2xl shadow-sm">
        <div class="text-xs text-slate-400">Experience</div>
        <div class="font-semibold">{{ $profile->experience_count ?? $experience->count().' roles' }}</div>
      </div>
      <div class="bg-white p-3 rounded-2xl shadow-sm">
        <div class="text-xs text-slate-400">Skills</div>
        <div class="font-semibold">{{ $skills->take(3)->pluck('name')->implode(' · ') ?: '—' }}</div>
      </div>
      <div class="bg-white p-3 rounded-2xl shadow-sm">
        <div class="text-xs text-slate-400">Projects</div>
        <div class="font-semibold">{{ $profile->projects_count ?? $projects->count().'+ shipped' }}</div>
      </div>
    </div>
  </div>

  <div class="flex justify-center md:justify-end">
    <div class="w-72 h-72 rounded-3xl bg-gradient-to-br from-indigo-50 to-pink-50 flex items-center justify-center shadow-2xl">
      @if(!empty($profile->photo))
        <img src="{{ asset($profile->photo) }}" class="w-64 h-64 object-cover rounded-2xl border-4 border-white shadow" />
      @else
        <div class="w-64 h-64 rounded-2xl bg-indigo-600 text-white flex items-center justify-center text-6xl font-bold border-4 border-white shadow">
          {{ strtoupper(substr($profile->name ?? 'P', 0, 1)) }}
        </div>
      @endif
    </div>
  </div>
</section>

<!-- About -->
<section id="about" class="mt-16 section-fade">
  <h2 class="text-2xl font-semibold">About Me</h2>
  <p class="mt-3 text-slate-600 max-w-2xl">{{ $profile->about ?? '' }}</p>
</section>

<!-- Education -->
@if($education->count())
<section id="education" class="mt-16 section-fade">
  <h3 class="text-xl font-semibold">Education</h3>
  <div class="mt-4 space-y-4">
    @foreach($education as $e)
     <div class="bg-white p-4 rounded-2xl shadow-sm card-hover transition">

    <h4 class="font-semibold">
        {{ $e->degree }}

        <span class="text-sm font-normal text-slate-400">
            ({{ $e->start_year }} — {{ $e->end_year ?: 'Present' }})
        </span>
    </h4>

    <p class="text-sm text-slate-500">
        {{ $e->institution }}

        @if($e->group)
            <span class="text-xs bg-slate-100 px-2 py-0.5 rounded-full ml-1">
                {{ $e->group }}
            </span>
        @endif 
    </p>

    @if($e->description)
        <p class="text-sm text-slate-500 mt-1">
            {{ $e->description }}
        </p>
    @endif

</div>
    @endforeach
  </div>
</section>
@endif

<!-- Experience -->
@if($experience->count())
<section id="experience" class="mt-16 section-fade">
  <h3 class="text-xl font-semibold">Experience</h3>
  <div class="mt-4 space-y-4">
    @foreach($experience as $ex)
      <div class="bg-white p-4 rounded-2xl shadow-sm card-hover transition">

    <h4 class="font-semibold">
        {{ $ex->title }}

        <span class="text-sm font-normal text-slate-400">
            ({{ $ex->start_date }} — {{ $ex->end_date ?: 'Present' }})
        </span>
    </h4>

    <p class="text-sm text-slate-500">
        {{ $ex->company }}

        @if($ex->website_url)
            · <a href="{{ $ex->website_url }}"
                 target="_blank"
                 class="text-indigo-600 hover:underline">
                Visit Website
            </a>
        @endif
    </p>

    @if($ex->description)
        <ul class="mt-2 text-sm text-slate-600 list-disc list-inside space-y-1">
            @foreach(preg_split('/\r\n|\r|\n/', $ex->description) as $line)
                @if(trim($line) !== '')
                    <li>{{ $line }}</li>
                @endif
            @endforeach
        </ul>
    @endif
</div>
    @endforeach
  </div>
</section>
@endif

<!-- Skills -->
@if($skills->count())
<section id="skills" class="mt-16 section-fade">
  <h3 class="text-xl font-semibold">Skills</h3>
  <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    @foreach($skills as $s)
      <div class="bg-white p-4 rounded-xl shadow-sm">
        <div class="flex items-center justify-between text-sm">
          <span class="font-medium">{{ $s->name }}</span>
          <span class="text-slate-400">{{ $s->level }}%</span>
        </div>
        <div class="mt-2 h-2 bg-slate-100 rounded-full overflow-hidden">
          <div class="h-full bg-indigo-600 rounded-full" style="width: {{ $s->level }}%"></div>
        </div>
      </div>
    @endforeach
  </div>
</section>
@endif

<!-- Projects -->
<section id="projects" class="mt-16 section-fade">
  <div class="flex items-center justify-between">
    <h3 class="text-xl font-semibold">Selected Projects</h3>
  </div>

  <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
    @forelse($projects as $p)
    <a href="{{ route('projects.show', $p->slug) }}" class="bg-white p-4 rounded-2xl shadow-sm card-hover transform transition duration-200">
      <div class="h-40 w-full rounded-xl overflow-hidden bg-slate-100 flex items-center justify-center">
        @if($p->thumbnail)
          <img src="{{ asset($p->thumbnail) }}" class="w-full h-full object-cover" alt="{{ $p->title }}">
        @else
          <div class="text-slate-400">{{ $p->title }}</div>
        @endif
      </div>
      <h4 class="mt-3 font-semibold">{{ $p->title }}</h4>
      <p class="text-sm text-slate-500 mt-1">{{ $p->short_description }}</p>
      <div class="mt-3 flex items-center justify-between text-xs text-slate-400">
        <div>{{ $p->created_at->format('M Y') }}</div>
        <div class="flex gap-3">
          @if($p->github_url)<span>GitHub</span>@endif
          @if($p->project_url)<span>Live</span>@endif
        </div>
      </div>
    </a>
    @empty
      <div class="text-slate-400 col-span-3">No projects published yet.</div>
    @endforelse
  </div>
</section>

<!-- Achievements -->
@if($achievements->count())
<section id="achievements" class="mt-16 section-fade">
  <h3 class="text-xl font-semibold">Achievements & Certifications</h3>
  <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    @foreach($achievements as $a)
      <div class="bg-white p-4 rounded-2xl shadow-sm flex items-start gap-3 card-hover transition">
        <div class="text-indigo-600 text-2xl">{{ $a->icon }}</div>
        <div>
          <h4 class="font-semibold">{{ $a->title }}</h4>
          <p class="text-sm text-slate-500">{{ $a->issuer }} @if($a->year) — {{ $a->year }} @endif</p>
        </div>
      </div>
    @endforeach
  </div>
</section>
@endif

<!-- Contact -->
<section id="contact" class="mt-16 bg-white p-6 md:p-8 rounded-2xl shadow-sm section-fade">
  <h3 class="text-lg font-semibold">Contact Me</h3>
  <p class="text-sm text-slate-500 mt-1">
    Have a project in mind or just want to say hi?
    @if(!empty($profile->email))
    Reach me at
    <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $profile->email }}&su=Portfolio%20Contact&body=Hello%2C%20I%20would%20like%20to%20contact%20you."
       target="_blank"
       class="text-indigo-600">
        {{ $profile->email }}
    </a>
    also reach me at 
    <a href="tel:{{ $profile->phone }}" class="text-indigo-600">
    {{ $profile->phone }}
</a>

@endif
    Or send a message directly below — it goes straight to my inbox.
  </p>
  <p class="text-sm text-slate-500 mt-1 mb-2"> &  This my LinkedIn Profile</p>
  

<a href="{{ $profile->linkedin_url }}"
   target="_blank"
   rel="noopener noreferrer"
   class="inline-block bg-indigo-600 text-white rounded-2xl px-4 py-2 touch-btn">
    View LinkedIn Profile
</a>

  @if(session('success'))
    <div class="mt-3 text-green-600">{{ session('success') }}</div>
  @endif

  <form action="{{ route('contact.send') }}" method="POST" class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    @csrf
    
    <input name="name" placeholder="Your name" value="{{ old('name') }}" class="border p-3 rounded-lg" required />
    <input name="email" type="email" placeholder="Email" value="{{ old('email') }}" class="border p-3 rounded-lg" required />
    <input name="phone" placeholder="Phone" value="{{ old('phone') }}" class="border p-3 rounded-lg" required />
    <input name="subject" placeholder="Subject" value="{{ old('subject') }}" class="border p-3 rounded-lg md:col-span-2" />
    <textarea name="message" placeholder="Message" rows="5" class="border p-3 rounded-lg md:col-span-2" required>{{ old('message') }}</textarea>
    <div class="md:col-span-2 flex justify-end">
      <button type="submit" class="bg-indigo-600 text-white rounded-2xl px-5 py-2 touch-btn">Send Message</button>
    </div>
  </form>
</section>

@endsection
