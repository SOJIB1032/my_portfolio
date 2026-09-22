<?php $__env->startSection('content'); ?>

<div class="flex items-center justify-between mb-6">
  <h1 class="text-2xl font-bold">Dashboard</h1>
  <div class="text-sm text-slate-500"><?php echo e(now()->format('d M Y')); ?></div>
</div>

<!-- Stats grid -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
  <a href="<?php echo e(route('admin.projects.index')); ?>" class="bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition">
    <div class="text-2xl font-bold text-indigo-600"><?php echo e($stats['projects']); ?></div>
    <div class="text-xs text-slate-500 mt-1">Projects</div>
  </a>
  <a href="<?php echo e(route('admin.education.index')); ?>" class="bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition">
    <div class="text-2xl font-bold text-indigo-600"><?php echo e($stats['education']); ?></div>
    <div class="text-xs text-slate-500 mt-1">Education</div>
  </a>
  <a href="<?php echo e(route('admin.experience.index')); ?>" class="bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition">
    <div class="text-2xl font-bold text-indigo-600"><?php echo e($stats['experience']); ?></div>
    <div class="text-xs text-slate-500 mt-1">Experience</div>
  </a>
  <a href="<?php echo e(route('admin.skills.index')); ?>" class="bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition">
    <div class="text-2xl font-bold text-indigo-600"><?php echo e($stats['skills']); ?></div>
    <div class="text-xs text-slate-500 mt-1">Skills</div>
  </a>
  <a href="<?php echo e(route('admin.achievements.index')); ?>" class="bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition">
    <div class="text-2xl font-bold text-indigo-600"><?php echo e($stats['achievements']); ?></div>
    <div class="text-xs text-slate-500 mt-1">Achievements</div>
  </a>
  <a href="<?php echo e(route('admin.messages')); ?>" class="bg-white p-4 rounded-2xl shadow-sm hover:shadow-md transition">
    <div class="text-2xl font-bold <?php echo e($stats['unread'] > 0 ? 'text-red-600' : 'text-indigo-600'); ?>"><?php echo e($stats['unread']); ?></div>
    <div class="text-xs text-slate-500 mt-1">Unread Messages</div>
  </a>
</div>

<!-- Recent messages -->
<div class="mt-8">
  <div class="flex items-center justify-between mb-3">
    <h2 class="text-lg font-semibold">Recent Messages</h2>
    <a href="<?php echo e(route('admin.messages')); ?>" class="text-sm text-indigo-600">View all</a>
  </div>

  <div class="space-y-3">
    <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="bg-white p-4 rounded-xl shadow-sm flex items-start justify-between gap-4">
        <div>
          <div class="flex items-center gap-2 text-sm">
            <span class="font-semibold"><?php echo e($message->name); ?></span>
            <span class="text-slate-400">&lt;<?php echo e($message->email); ?>&gt;</span>
            <?php if(!$message->read): ?>
              <span class="text-[10px] px-2 py-0.5 bg-red-100 text-red-600 rounded-full">Unread</span>
            <?php endif; ?>
          </div>
          <p class="mt-1 text-slate-600 text-sm"><?php echo e(Str::limit($message->message, 90)); ?></p>
        </div>
        <div class="text-xs text-slate-400 whitespace-nowrap"><?php echo e($message->created_at->diffForHumans()); ?></div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="text-slate-400 text-sm">No messages yet.</div>
    <?php endif; ?>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\OneDrive\Desktop\portfolio-full-stack\portfolio-full-stack\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>