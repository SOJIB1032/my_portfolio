<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between mb-6">
  <h1 class="text-2xl font-bold">Projects</h1>
  <a href="<?php echo e(route('admin.projects.create')); ?>" class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-medium">+ New Project</a>
</div>

<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
  <table class="w-full text-sm">
    <thead class="bg-slate-50 text-left text-slate-500">
      <tr>
        <th class="px-4 py-3">Title</th>
        <th class="px-4 py-3">Published</th>
        <th class="px-4 py-3">Created</th>
        <th class="px-4 py-3 text-right">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr class="border-t">
        <td class="px-4 py-3 font-medium"><?php echo e($p->title); ?></td>
        <td class="px-4 py-3">
          <span class="text-xs px-2 py-1 rounded-full <?php echo e($p->published ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-500'); ?>">
            <?php echo e($p->published ? 'Published' : 'Draft'); ?>

          </span>
        </td>
        <td class="px-4 py-3 text-slate-400"><?php echo e($p->created_at->format('d M Y')); ?></td>
        <td class="px-4 py-3 text-right space-x-2">
          <a href="<?php echo e(route('admin.projects.edit', $p)); ?>" class="px-3 py-1 border rounded-lg">Edit</a>
          <form action="<?php echo e(route('admin.projects.destroy', $p)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Delete this project?')">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <button class="px-3 py-1 border border-red-200 text-red-600 rounded-lg">Delete</button>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr><td colspan="4" class="px-4 py-6 text-center text-slate-400">No projects yet.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<div class="mt-4"><?php echo e($projects->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\OneDrive\Desktop\portfolio-full-stack\portfolio-full-stack\resources\views/admin/projects/index.blade.php ENDPATH**/ ?>