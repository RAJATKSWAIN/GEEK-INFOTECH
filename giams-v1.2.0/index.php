<?php
require_once __DIR__ . '/core/config.php';
require_once SYS_ROOT . 'core/session.php';
if (isset($_SESSION['user_id'], $_SESSION['role'])) {
    Session::redirectByRole($_SESSION['role']);
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><script src="https://cdn.tailwindcss.com"></script><title>GIAMS Login</title></head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center">
<form method="post" action="<?= url('api/auth/login.php') ?>" class="bg-white p-6 rounded-xl shadow w-full max-w-md space-y-3">
<h1 class="font-bold text-xl">GIAMS v1.2.0 Login</h1>
<select name="role" class="border p-2 w-full" required><option value="">Role</option><option>ADMIN</option><option>COUNSELOR</option><option>FACULTY</option><option>STUDENT</option></select>
<input name="username" class="border p-2 w-full" placeholder="Username" required>
<input name="password" type="password" class="border p-2 w-full" placeholder="Password" required>
<button class="bg-blue-900 text-white px-4 py-2 rounded w-full">Login</button>
</form>
</body></html>
