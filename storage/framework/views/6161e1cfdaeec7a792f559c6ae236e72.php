<?php $__env->startSection('content'); ?>
<div class="max-w-2xl">
  <h1 class="text-2xl font-bold mb-6">Edit Project</h1>

  <form method="POST" action="<?php echo e(route('admin.projects.update', $project)); ?>" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow-sm space-y-4">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

    <div>
      <label class="text-sm font-medium text-slate-600">Title</label>
      <input name="title" value="<?php echo e(old('title', $project->title)); ?>" class="w-full mt-1 border p-3 rounded-xl" required />
    </div>

    <div>
      <label class="text-sm font-medium text-slate-600">Short description</label>
      <input name="short_description" value="<?php echo e(old('short_description', $project->short_description)); ?>" class="w-full mt-1 border p-3 rounded-xl" />
    </div>

    <div>
      <label class="text-sm font-medium text-slate-600">Full description</label>
      <textarea name="description" rows="6" class="w-full mt-1 border p-3 rounded-xl"><?php echo e(old('description', $project->description)); ?></textarea>
    </div>

    <div>
      <label class="text-sm font-medium text-slate-600">Thumbnail image</label>
      <input type="file" name="thumbnail" class="w-full mt-1 border p-2 rounded-xl" />
      <?php if($project->thumbnail): ?>
        <div class="text-sm text-slate-500 mt-2">Current: <img src="<?php echo e(asset($project->thumbnail)); ?>" alt="<?php echo e($project->title); ?>" class="inline-block h-10 rounded"/></div>
      <?php endif; ?>
    </div>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-medium text-slate-600">Live URL</label>
        <input name="project_url" value="<?php echo e(old('project_url', $project->project_url)); ?>" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
      <div>
        <label class="text-sm font-medium text-slate-600">GitHub URL</label>
        <input name="github_url" value="<?php echo e(old('github_url', $project->github_url)); ?>" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
    </div>

    <label class="inline-flex items-center gap-2 text-sm">
      <input type="checkbox" name="published" value="1" <?php echo e(old('published', $project->published) ? 'checked' : ''); ?>> Published (visible on site)
    </label>

    <div class="flex justify-end gap-2 pt-2">
      <a href="<?php echo e(route('admin.projects.index')); ?>" class="px-4 py-2 border rounded-xl">Cancel</a>
      <button class="px-4 py-2 bg-indigo-600 text-white rounded-xl">Update Project</button>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\OneDrive\Desktop\portfolio-full-stack\portfolio-full-stack\resources\views/admin/projects/edit.blade.php ENDPATH**/ ?>