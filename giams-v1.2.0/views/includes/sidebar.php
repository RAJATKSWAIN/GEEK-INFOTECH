<?php $role = $_SESSION['role'] ?? 'GUEST'; ?>
<aside class="w-64 bg-slate-900 text-white min-h-screen p-5">
  <div class="font-bold text-lg mb-4">GIAMS v1.2.0</div>
  <div class="text-xs text-slate-400 mb-4">Role: <?= htmlspecialchars($role) ?></div>
  <a class="block mb-2" href="<?= url('views/' . strtolower($role) . '/dashboard.php') ?>">Dashboard</a>
  <a class="block" href="<?= url('api/auth/logout.php') ?>">Logout</a>
</aside>
