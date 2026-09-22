<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Panel — Portfolio</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .nav-link { display:flex; align-items:center; gap:.6rem; padding:.65rem .9rem; border-radius:.75rem; color:#475569; font-size:.9rem; }
    .nav-link:hover { background:#f1f5f9; color:#1e293b; }
    .nav-link.active { background:#eef2ff; color:#4338ca; font-weight:600; }
  </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

  <div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r hidden md:flex md:flex-col">
      <div class="px-5 py-5 border-b">
        <div class="font-bold text-lg text-indigo-600">Admin Panel</div>
        <div class="text-xs text-slate-400">Portfolio Manager</div>
      </div>

      <nav class="flex-1 px-3 py-4 space-y-1">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">📊 Dashboard</a>
        <a href="<?php echo e(route('admin.profile.edit')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.profile.*') ? 'active' : ''); ?>">👤 Profile</a>
        <a href="<?php echo e(route('admin.projects.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.projects.*') ? 'active' : ''); ?>">💼 Projects</a>
        <a href="<?php echo e(route('admin.education.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.education.*') ? 'active' : ''); ?>">🎓 Education</a>
        <a href="<?php echo e(route('admin.experience.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.experience.*') ? 'active' : ''); ?>">🧳 Experience</a>
        <a href="<?php echo e(route('admin.skills.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.skills.*') ? 'active' : ''); ?>">🛠️ Skills</a>
        <a href="<?php echo e(route('admin.achievements.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.achievements.*') ? 'active' : ''); ?>">🏆 Achievements</a>
        <a href="<?php echo e(route('admin.messages')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.messages') ? 'active' : ''); ?>">✉️ Messages</a>
      </nav>

      <div class="px-3 py-4 border-t">
        <a href="<?php echo e(route('home')); ?>" target="_blank" class="nav-link">🌐 View Site</a>
        <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
          <?php echo csrf_field(); ?>
          <button class="w-full text-left nav-link text-red-600">🚪 Logout</button>
        </form>
      </div>
    </aside>

    <!-- Main -->
    <div class="flex-1 min-w-0">
      <!-- Mobile top bar -->
      <div class="md:hidden bg-white border-b px-4 py-3 flex items-center justify-between">
        <div class="font-bold text-indigo-600">Admin Panel</div>
        <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
          <?php echo csrf_field(); ?>
          <button class="text-sm text-red-600">Logout</button>
        </form>
      </div>

      <main class="max-w-5xl mx-auto px-4 md:px-8 py-8">
        <?php if(session('success')): ?>
          <div class="mb-4 p-3 bg-green-50 text-green-700 rounded-lg text-sm"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
          <div class="mb-4 p-3 bg-red-50 text-red-700 rounded-lg text-sm"><?php echo e(implode(', ', $errors->all())); ?></div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
      </main>
    </div>

  </div>

</body>
</html>
<?php /**PATH C:\Users\User\OneDrive\Desktop\portfolio-full-stack\portfolio-full-stack\resources\views/layouts/admin.blade.php ENDPATH**/ ?>