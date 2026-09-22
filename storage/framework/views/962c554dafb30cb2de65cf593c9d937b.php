<?php $__env->startSection('content'); ?>
<div class="max-w-2xl">
  <h1 class="text-2xl font-bold mb-6">Profile / Site Settings</h1>
  <p class="text-sm text-slate-500 -mt-4 mb-6">এই তথ্যগুলো homepage এর Hero, About, Footer এবং Contact section এ দেখা যাবে।</p>

  <form method="POST" action="<?php echo e(route('admin.profile.update')); ?>" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow-sm space-y-4">
    <?php echo csrf_field(); ?>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-medium text-slate-600">Full Name</label>
        <input name="name" value="<?php echo e(old('name', $profile->name)); ?>" class="w-full mt-1 border p-3 rounded-xl" required />
      </div>
      <div>
        <label class="text-sm font-medium text-slate-600">Title / Role</label>
        <input name="title" value="<?php echo e(old('title', $profile->title)); ?>" placeholder="e.g. Data Science & Web Developer" class="w-full mt-1 border p-3 rounded-xl" required />
      </div>
    </div>

    <div>
      <label class="text-sm font-medium text-slate-600">Tagline (short line under name)</label>
      <input name="tagline" value="<?php echo e(old('tagline', $profile->tagline)); ?>" class="w-full mt-1 border p-3 rounded-xl" />
    </div>

    <div>
      <label class="text-sm font-medium text-slate-600">About Me</label>
      <textarea name="about" rows="5" class="w-full mt-1 border p-3 rounded-xl"><?php echo e(old('about', $profile->about)); ?></textarea>
    </div>

    <div>
      <label class="text-sm font-medium text-slate-600">Profile Photo</label>
      <input type="file" name="photo" class="w-full mt-1 border p-2 rounded-xl" />
      <?php if($profile->photo): ?>
        <div class="text-sm text-slate-500 mt-2">Current: <img src="<?php echo e(asset($profile->photo)); ?>" class="inline-block h-10 rounded"/></div>
      <?php endif; ?>
    </div>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-medium text-slate-600">Email</label>
        <input name="email" value="<?php echo e(old('email', $profile->email)); ?>" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
      <div>
        <label class="text-sm font-medium text-slate-600">Phone</label>
        <input name="phone" value="<?php echo e(old('phone', $profile->phone)); ?>" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-medium text-slate-600">GitHub URL</label>
        <input name="github_url" value="<?php echo e(old('github_url', $profile->github_url)); ?>" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
      <div>
        <label class="text-sm font-medium text-slate-600">LinkedIn URL</label>
        <input name="linkedin_url" value="<?php echo e(old('linkedin_url', $profile->linkedin_url)); ?>" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
    </div>

    <div>
      <label class="text-sm font-medium text-slate-600">Resume / CV Link (optional)</label>
      <input name="resume_url" value="<?php echo e(old('resume_url', $profile->resume_url)); ?>" class="w-full mt-1 border p-3 rounded-xl" />
    </div>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="text-sm font-medium text-slate-600">Hero stat — Projects (e.g. "12+")</label>
        <input name="projects_count" value="<?php echo e(old('projects_count', $profile->projects_count)); ?>" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
      <div>
        <label class="text-sm font-medium text-slate-600">Hero stat — Experience (e.g. "3 internships")</label>
        <input name="experience_count" value="<?php echo e(old('experience_count', $profile->experience_count)); ?>" class="w-full mt-1 border p-3 rounded-xl" />
      </div>
    </div>

    <div class="flex justify-end pt-2">
      <button class="px-4 py-2 bg-indigo-600 text-white rounded-xl">Save Profile</button>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\OneDrive\Desktop\portfolio-full-stack\portfolio-full-stack\resources\views/admin/profile/edit.blade.php ENDPATH**/ ?>