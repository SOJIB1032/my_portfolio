<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between mb-6">
  <h1 class="text-2xl font-bold">Messages</h1>
</div>

<?php if($messages->isEmpty()): ?>
  <div class="text-slate-400">No messages yet.</div>
<?php else: ?>
  <div class="space-y-3">
    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="bg-white p-4 rounded-xl shadow-sm <?php echo e($m->read ? '' : 'ring-1 ring-indigo-200'); ?>">
        <div class="flex justify-between items-start gap-4">
          <div>
            <div class="font-semibold"><?php echo e($m->name); ?> <span class="text-xs text-slate-400 font-normal">&lt;<?php echo e($m->email); ?>&gt;</span></div>
            <?php if($m->subject): ?><div class="text-sm text-slate-500"><?php echo e($m->subject); ?></div><?php endif; ?>
            <div class="text-xs text-slate-400 mt-1"><?php echo e($m->created_at->format('d M Y, h:i A')); ?></div>
            <p class="mt-2 text-slate-700 text-sm"><?php echo e($m->message); ?></p>
          </div>

          <div class="flex flex-col items-end gap-2 shrink-0">
            <span class="text-xs px-2 py-1 rounded-full <?php echo e($m->read ? 'bg-slate-100 text-slate-500' : 'bg-indigo-100 text-indigo-600'); ?>">
              <?php echo e($m->read ? 'Read' : 'Unread'); ?>

            </span>
            <?php if(!$m->read): ?>
              <form method="POST" action="<?php echo e(route('admin.messages.read', $m->id)); ?>">
                <?php echo csrf_field(); ?>
                <button class="text-xs px-3 py-1 bg-indigo-600 text-white rounded-lg">Mark read</button>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\OneDrive\Desktop\portfolio-full-stack\portfolio-full-stack\resources\views/admin/messages.blade.php ENDPATH**/ ?>