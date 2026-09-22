<?php $__env->startSection('content'); ?>

<!-- Hero -->
<section class="grid md:grid-cols-2 gap-10 items-center section-fade">
  <div>
    <div class="text-slate-500">Hi, I'm</div>
    <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
      <?php echo e($profile->name ?? 'Your Name'); ?> —
      <span class="text-indigo-600"><?php echo e($profile->title ?? 'Your Title'); ?></span>
    </h1>
    <p class="mt-4 text-slate-600 max-w-xl"><?php echo e($profile->tagline ?? ''); ?></p>

    <div class="mt-6 flex gap-3">
      <a href="#projects" class="touch-btn bg-indigo-600 text-white rounded-2xl px-4 py-2 shadow card-hover">View Projects</a>
      <a href="#contact" class="touch-btn border rounded-2xl px-4 py-2">Contact</a>
      <?php if(!empty($profile->resume_url)): ?>
        <a href="<?php echo e($profile->resume_url); ?>" target="_blank" class="touch-btn border rounded-2xl px-4 py-2">Resume</a>
      <?php endif; ?>
    </div>

    <div class="mt-6 grid grid-cols-3 gap-3">
      <div class="bg-white p-3 rounded-2xl shadow-sm">
        <div class="text-xs text-slate-400">Experience</div>
        <div class="font-semibold"><?php echo e($profile->experience_count ?? $experience->count().' roles'); ?></div>
      </div>
      <div class="bg-white p-3 rounded-2xl shadow-sm">
        <div class="text-xs text-slate-400">Skills</div>
        <div class="font-semibold"><?php echo e($skills->take(3)->pluck('name')->implode(' · ') ?: '—'); ?></div>
      </div>
      <div class="bg-white p-3 rounded-2xl shadow-sm">
        <div class="text-xs text-slate-400">Projects</div>
        <div class="font-semibold"><?php echo e($profile->projects_count ?? $projects->count().'+ shipped'); ?></div>
      </div>
    </div>
  </div>

  <div class="flex justify-center md:justify-end">
    <div class="w-72 h-72 rounded-3xl bg-gradient-to-br from-indigo-50 to-pink-50 flex items-center justify-center shadow-2xl">
      <?php if(!empty($profile->photo)): ?>
        <img src="<?php echo e(asset($profile->photo)); ?>" class="w-64 h-64 object-cover rounded-2xl border-4 border-white shadow" />
      <?php else: ?>
        <div class="w-64 h-64 rounded-2xl bg-indigo-600 text-white flex items-center justify-center text-6xl font-bold border-4 border-white shadow">
          <?php echo e(strtoupper(substr($profile->name ?? 'P', 0, 1))); ?>

        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- About -->
<section id="about" class="mt-16 section-fade">
  <h2 class="text-2xl font-semibold">About Me</h2>
  <p class="mt-3 text-slate-600 max-w-2xl"><?php echo e($profile->about ?? ''); ?></p>
</section>

<!-- Education -->
<?php if($education->count()): ?>
<section id="education" class="mt-16 section-fade">
  <h3 class="text-xl font-semibold">Education</h3>
  <div class="mt-4 space-y-4">
    <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <div class="bg-white p-4 rounded-2xl shadow-sm card-hover transition">

    <h4 class="font-semibold">
        <?php echo e($e->degree); ?>


        <span class="text-sm font-normal text-slate-400">
            (<?php echo e($e->start_year); ?> — <?php echo e($e->end_year ?: 'Present'); ?>)
        </span>
    </h4>

    <p class="text-sm text-slate-500">
        <?php echo e($e->institution); ?>


        <?php if($e->group): ?>
            <span class="text-xs bg-slate-100 px-2 py-0.5 rounded-full ml-1">
                <?php echo e($e->group); ?>

            </span>
        <?php endif; ?>
    </p>

    <?php if($e->description): ?>
        <p class="text-sm text-slate-500 mt-1">
            <?php echo e($e->description); ?>

        </p>
    <?php endif; ?>

</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</section>
<?php endif; ?>

<!-- Experience -->
<?php if($experience->count()): ?>
<section id="experience" class="mt-16 section-fade">
  <h3 class="text-xl font-semibold">Experience</h3>
  <div class="mt-4 space-y-4">
    <?php $__currentLoopData = $experience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="bg-white p-4 rounded-2xl shadow-sm card-hover transition">

    <h4 class="font-semibold">
        <?php echo e($ex->title); ?>


        <span class="text-sm font-normal text-slate-400">
            (<?php echo e($ex->start_date); ?> — <?php echo e($ex->end_date ?: 'Present'); ?>)
        </span>
    </h4>

    <p class="text-sm text-slate-500">
        <?php echo e($ex->company); ?>


        <?php if($ex->website_url): ?>
            · <a href="<?php echo e($ex->website_url); ?>"
                 target="_blank"
                 class="text-indigo-600 hover:underline">
                Visit Website
            </a>
        <?php endif; ?>
    </p>

    <?php if($ex->description): ?>
        <ul class="mt-2 text-sm text-slate-600 list-disc list-inside space-y-1">
            <?php $__currentLoopData = preg_split('/\r\n|\r|\n/', $ex->description); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(trim($line) !== ''): ?>
                    <li><?php echo e($line); ?></li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</section>
<?php endif; ?>

<!-- Skills -->
<?php if($skills->count()): ?>
<section id="skills" class="mt-16 section-fade">
  <h3 class="text-xl font-semibold">Skills</h3>
  <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="bg-white p-4 rounded-xl shadow-sm">
        <div class="flex items-center justify-between text-sm">
          <span class="font-medium"><?php echo e($s->name); ?></span>
          <span class="text-slate-400"><?php echo e($s->level); ?>%</span>
        </div>
        <div class="mt-2 h-2 bg-slate-100 rounded-full overflow-hidden">
          <div class="h-full bg-indigo-600 rounded-full" style="width: <?php echo e($s->level); ?>%"></div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</section>
<?php endif; ?>

<!-- Projects -->
<section id="projects" class="mt-16 section-fade">
  <div class="flex items-center justify-between">
    <h3 class="text-xl font-semibold">Selected Projects</h3>
  </div>

  <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
    <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <a href="<?php echo e(route('projects.show', $p->slug)); ?>" class="bg-white p-4 rounded-2xl shadow-sm card-hover transform transition duration-200">
      <div class="h-40 w-full rounded-xl overflow-hidden bg-slate-100 flex items-center justify-center">
        <?php if($p->thumbnail): ?>
          <img src="<?php echo e(asset($p->thumbnail)); ?>" class="w-full h-full object-cover" alt="<?php echo e($p->title); ?>">
        <?php else: ?>
          <div class="text-slate-400"><?php echo e($p->title); ?></div>
        <?php endif; ?>
      </div>
      <h4 class="mt-3 font-semibold"><?php echo e($p->title); ?></h4>
      <p class="text-sm text-slate-500 mt-1"><?php echo e($p->short_description); ?></p>
      <div class="mt-3 flex items-center justify-between text-xs text-slate-400">
        <div><?php echo e($p->created_at->format('M Y')); ?></div>
        <div class="flex gap-3">
          <?php if($p->github_url): ?><span>GitHub</span><?php endif; ?>
          <?php if($p->project_url): ?><span>Live</span><?php endif; ?>
        </div>
      </div>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="text-slate-400 col-span-3">No projects published yet.</div>
    <?php endif; ?>
  </div>
</section>

<!-- Achievements -->
<?php if($achievements->count()): ?>
<section id="achievements" class="mt-16 section-fade">
  <h3 class="text-xl font-semibold">Achievements & Certifications</h3>
  <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    <?php $__currentLoopData = $achievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="bg-white p-4 rounded-2xl shadow-sm flex items-start gap-3 card-hover transition">
        <div class="text-indigo-600 text-2xl"><?php echo e($a->icon); ?></div>
        <div>
          <h4 class="font-semibold"><?php echo e($a->title); ?></h4>
          <p class="text-sm text-slate-500"><?php echo e($a->issuer); ?> <?php if($a->year): ?> — <?php echo e($a->year); ?> <?php endif; ?></p>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</section>
<?php endif; ?>

<!-- Contact -->
<section id="contact" class="mt-16 bg-white p-6 md:p-8 rounded-2xl shadow-sm section-fade">
  <h3 class="text-lg font-semibold">Contact Me</h3>
  <p class="text-sm text-slate-500 mt-1">
    Have a project in mind or just want to say hi?
    <?php if(!empty($profile->email)): ?> Reach me at <a href="mailto:<?php echo e($profile->email); ?>" class="text-indigo-600"><?php echo e($profile->email); ?></a> <?php endif; ?>
    <?php if(!empty($profile->phone)): ?> or call <?php echo e($profile->phone); ?>. <?php endif; ?>
    Or send a message directly below — it goes straight to my admin inbox.
  </p>

  <?php if(session('success')): ?>
    <div class="mt-3 text-green-600"><?php echo e(session('success')); ?></div>
  <?php endif; ?>

  <form action="<?php echo e(route('contact.send')); ?>" method="POST" class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    <?php echo csrf_field(); ?>
    <input name="name" placeholder="Your name" value="<?php echo e(old('name')); ?>" class="border p-3 rounded-lg" required />
    <input name="email" type="email" placeholder="Email" value="<?php echo e(old('email')); ?>" class="border p-3 rounded-lg" required />
    <input name="subject" placeholder="Subject" value="<?php echo e(old('subject')); ?>" class="border p-3 rounded-lg md:col-span-2" />
    <textarea name="message" placeholder="Message" rows="5" class="border p-3 rounded-lg md:col-span-2" required><?php echo e(old('message')); ?></textarea>
    <div class="md:col-span-2 flex justify-end">
      <button type="submit" class="bg-indigo-600 text-white rounded-2xl px-5 py-2 touch-btn">Send Message</button>
    </div>
  </form>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\OneDrive\Desktop\portfolio-full-stack\portfolio-full-stack\resources\views/home.blade.php ENDPATH**/ ?>