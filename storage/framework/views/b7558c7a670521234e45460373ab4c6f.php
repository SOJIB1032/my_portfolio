<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between mb-6">
  <h1 class="text-2xl font-bold">Achievements</h1>
  <a href="<?php echo e(route('admin.achievements.create')); ?>" class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-medium">+ Add Achievement</a>
</div>

<div class="grid md:grid-cols-2 gap-3">
  <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="bg-white p-4 rounded-2xl shadow-sm flex items-start justify-between">
      <div class="flex items-start gap-3">
        <div class="text-2xl"><?php echo e($item->icon); ?></div>
        <div>
          <div class="font-semibold"><?php echo e($item->title); ?></div>
          <div class="text-sm text-slate-500"><?php echo e($item->issuer); ?> <?php if($item->year): ?> — <?php echo e($item->year); ?> <?php endif; ?></div>
        </div>
      </div>
      <div class="flex gap-2 shrink-0">
        <a href="<?php echo e(route('admin.achievements.edit', $item)); ?>" class="px-3 py-1 border rounded-lg text-sm">Edit</a>
        <form action="<?php echo e(route('admin.achievements.destroy', $item)); ?>" method="POST" onsubmit="return confirm('Delete?')">
          <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
          <button class="px-3 py-1 border border-red-200 text-red-600 rounded-lg text-sm">Delete</button>
        </form>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="text-slate-400 bg-white p-6 rounded-2xl shadow-sm text-center md:col-span-2">No achievements yet.</div>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\OneDrive\Desktop\portfolio-full-stack\portfolio-full-stack\resources\views/admin/achievements/index.blade.php ENDPATH**/ ?>