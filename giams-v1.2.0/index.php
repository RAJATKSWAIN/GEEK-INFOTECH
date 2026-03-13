<?php
require_once __DIR__ . '/core/config.php';
require_once SYS_ROOT . 'core/session.php';
if (isset($_SESSION['user_id'], $_SESSION['role'])) {
    Session::redirectByRole($_SESSION['role']);
}
    
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>GIAMS v1.2.0 Login</title>
</head>
<body class="bg-gradient-to-br from-slate-100 to-slate-200 min-h-screen flex items-center justify-center">

  <form method="post" action="<?= url('api/auth/login.php') ?>" 
        class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md space-y-6">

    <!-- Branding -->
    <div class="text-center">
      <h1 class="text-2xl font-bold text-blue-900">Geek Infotech AMS</h1>
      <p class="text-sm text-gray-500">v1.2.0 • Secure Academic Portal</p>
    </div>

    <!-- Role Selector -->
    <select name="role" class="border p-3 w-full rounded-lg focus:ring-2 focus:ring-blue-900" required>
      <option value="">Select Role</option>
      <option>ADMIN</option>
      <option>COUNSELOR</option>
      <option>FACULTY</option>
      <option>STUDENT</option>
    </select>

    <!-- Username -->
    <input name="username" class="border p-3 w-full rounded-lg focus:ring-2 focus:ring-blue-900" 
           placeholder="Username" required>

    <!-- Password -->
    <input name="password" type="password" class="border p-3 w-full rounded-lg focus:ring-2 focus:ring-blue-900" 
           placeholder="Password" required>

    <!-- Login Button -->
    <button class="bg-gradient-to-r from-blue-900 to-indigo-900 text-white px-4 py-3 rounded-lg w-full font-semibold hover:opacity-90 transition">
      Login
    </button>

    <!-- Footer -->
    <p class="text-xs text-center text-gray-400">© 2026 Geek Infotech • GIAMS v1.2.0</p>
  </form>

</body>
</html>
