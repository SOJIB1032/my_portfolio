<?php $__env->startSection('content'); ?>
<div class="max-w-xl">
  <h1 class="text-2xl font-bold mb-6">Edit Education</h1>

  <form method="POST" action="<?php echo e(route('admin.education.update', $education)); ?>" class="bg-white p-6 rounded-2xl shadow-sm space-y-4">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
    <div>
      <label class="text-sm font-medium text-slate-600">Degree</label>
      <input name="degree" value="<?php echo e(old('degree', $education->degree)); ?>" class="w-full mt-1 border p-3 rounded-xl" required />
    </div>
    <div>
      <label class="text-sm font-medium text-slate-600">Institution</label>
      <input name="institution" value="<?php echo e(old('institution', $education->institution)); ?>" class="w-full mt-1 border p-3 rounded-xl" required />
    </div>
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-medium text-slate-600">Start Year</label>
        <input name="start_year" value="<?php echo e(old('start_year', $education->start_year)); ?>" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
      <div>
        <label class="text-sm font-medium text-slate-600">End Year</label>
        <input name="end_year" value="<?php echo e(old('end_year', $education->end_year)); ?>" placeholder="Present" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
    </div>
    <div>
      <label class="text-sm font-medium text-slate-600">Description (optional)</label>
      <textarea name="description" rows="3" class="w-full mt-1 border p-3 rounded-xl"><?php echo e(old('description', $education->description)); ?></textarea>
    </div>
    <div class="flex justify-end gap-2 pt-2">
      <a href="<?php echo e(route('admin.education.index')); ?>" class="px-4 py-2 border rounded-xl">Cancel</a>
      <button class="px-4 py-2 bg-indigo-600 text-white rounded-xl">Update</button>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\OneDrive\Desktop\portfolio-full-stack\portfolio-full-stack\resources\views/admin/education/edit.blade.php ENDPATH**/ ?>