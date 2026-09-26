<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between mb-6">
  <h1 class="text-2xl font-bold">Skills</h1>
  <a href="<?php echo e(route('admin.skills.create')); ?>" class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-medium">+ Add Skill</a>
</div>

<div class="grid md:grid-cols-2 gap-3">
  <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="bg-white p-4 rounded-2xl shadow-sm">
      <div class="flex items-center justify-between">
        <div class="font-semibold"><?php echo e($item->name); ?></div>
        <div class="flex gap-2">
          <a href="<?php echo e(route('admin.skills.edit', $item)); ?>" class="px-3 py-1 border rounded-lg text-sm">Edit</a>
          <form action="<?php echo e(route('admin.skills.destroy', $item)); ?>" method="POST" onsubmit="return confirm('Delete?')">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <button class="px-3 py-1 border border-red-200 text-red-600 rounded-lg text-sm">Delete</button>
          </form>
        </div>
      </div>
      <div class="mt-3 h-2 bg-slate-100 rounded-full overflow-hidden">
        <div class="h-full bg-indigo-600" style="width: <?php echo e($item->level); ?>%"></div>
      </div>
      <div class="text-xs text-slate-400 mt-1"><?php echo e($item->level); ?>%</div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="text-slate-400 bg-white p-6 rounded-2xl shadow-sm text-center md:col-span-2">No skills yet.</div>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\OneDrive\Desktop\portfolio-full-stack\portfolio-full-stack\resources\views/admin/skills/index.blade.php ENDPATH**/ ?>