<?php $__env->startSection('content'); ?>
<div class="max-w-md">
  <h1 class="text-2xl font-bold mb-6">Add Achievement</h1>

  <form method="POST" action="<?php echo e(route('admin.achievements.store')); ?>" class="bg-white p-6 rounded-2xl shadow-sm space-y-4">
    <?php echo csrf_field(); ?>
    <div>
      <label class="text-sm font-medium text-slate-600">Title</label>
      <input name="title" value="<?php echo e(old('title')); ?>" placeholder="e.g. Published Research Paper" class="w-full mt-1 border p-3 rounded-xl" required />
    </div>
    <div>
      <label class="text-sm font-medium text-slate-600">Issuer / Publisher (optional)</label>
      <input name="issuer" value="<?php echo e(old('issuer')); ?>" class="w-full mt-1 border p-3 rounded-xl" />
    </div>
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-medium text-slate-600">Year (optional)</label>
        <input name="year" value="<?php echo e(old('year')); ?>" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
      <div>
        <label class="text-sm font-medium text-slate-600">Icon (emoji)</label>
        <input name="icon" value="<?php echo e(old('icon', '🏆')); ?>" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
    </div>
    <div class="flex justify-end gap-2 pt-2">
      <a href="<?php echo e(route('admin.achievements.index')); ?>" class="px-4 py-2 border rounded-xl">Cancel</a>
      <button class="px-4 py-2 bg-indigo-600 text-white rounded-xl">Save</button>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\OneDrive\Desktop\portfolio-full-stack\portfolio-full-stack\resources\views/admin/achievements/create.blade.php ENDPATH**/ ?>