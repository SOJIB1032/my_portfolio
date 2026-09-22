<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Login — Portfolio</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-50 via-slate-50 to-pink-50 min-h-screen">
  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="bg-white p-8 rounded-3xl shadow-xl w-full max-w-md">
      <div class="text-center mb-6">
        <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-indigo-600 text-white text-2xl mb-3">🔒</div>
        <h2 class="text-xl font-bold">Admin Login</h2>
        <p class="text-sm text-slate-500 mt-1">Sign in to manage your portfolio</p>
      </div>

      @if(session('error'))
        <div class="mb-4 p-3 bg-amber-50 text-amber-700 rounded-lg text-sm">{{ session('error') }}</div>
      @endif
      @if($errors->any())
        <div class="mb-4 p-3 bg-red-50 text-red-700 rounded-lg text-sm">{{ $errors->first() }}</div>
      @endif

      <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-3">
        @csrf
        <input name="username" placeholder="Username" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-200 outline-none" />
        <input name="password" type="password" placeholder="Password" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-200 outline-none" />
        <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-xl font-medium hover:bg-indigo-700 transition">Login</button>
      </form>

      <div class="text-center mt-5">
        <a href="{{ route('home') }}" class="text-sm text-slate-400 hover:text-indigo-600">← Back to site</a>
      </div>
    </div>
  </div>
</body>
</html>
