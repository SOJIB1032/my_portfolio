<?php $__env->startSection('content'); ?>
<div class="max-w-xl">
  <h1 class="text-2xl font-bold mb-6">Add Experience</h1>

  <form method="POST" action="<?php echo e(route('admin.experience.store')); ?>" class="bg-white p-6 rounded-2xl shadow-sm space-y-4">
    <?php echo csrf_field(); ?>
    <div>
      <label class="text-sm font-medium text-slate-600">Job Title</label>
      <input name="title" value="<?php echo e(old('title')); ?>" placeholder="e.g. Web Developer Intern" class="w-full mt-1 border p-3 rounded-xl" required />
    </div>
    <div>
      <label class="text-sm font-medium text-slate-600">Company / Organization</label>
      <input name="company" value="<?php echo e(old('company')); ?>" class="w-full mt-1 border p-3 rounded-xl" required />
    </div>
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-medium text-slate-600">Start Date</label>
        <input name="start_date" value="<?php echo e(old('start_date')); ?>" placeholder="Jan 2025" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
      <div>
        <label class="text-sm font-medium text-slate-600">End Date</label>
        <input name="end_date" value="<?php echo e(old('end_date')); ?>" placeholder="Present" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
    </div>
    <div>
      <label class="text-sm font-medium text-slate-600">Description — এক লাইনে একটা bullet point</label>
      <textarea name="description" rows="4" placeholder="Built Laravel-based features...&#10;Worked with MySQL and REST APIs..." class="w-full mt-1 border p-3 rounded-xl"><?php echo e(old('description')); ?></textarea>
    </div>
    <div>
  <label class="text-sm font-medium text-slate-600">Website Link (optional)</label>
  <input name="website_url" value="<?php echo e(old('website_url')); ?>" placeholder="https://company-website.com" class="w-full mt-1 border p-3 rounded-xl" />
</div>
    <div class="flex justify-end gap-2 pt-2">
      <a href="<?php echo e(route('admin.experience.index')); ?>" class="px-4 py-2 border rounded-xl">Cancel</a>
      <button class="px-4 py-2 bg-indigo-600 text-white rounded-xl">Save</button>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\OneDrive\Desktop\portfolio-full-stack\portfolio-full-stack\resources\views/admin/experience/create.blade.php ENDPATH**/ ?>