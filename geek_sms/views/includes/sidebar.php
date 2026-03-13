<?php $role = $_SESSION['role'] ?? 'GUEST'; ?>
<aside class="w-64 bg-slate-900 text-white min-h-screen p-6">
    <h2 class="text-xl font-bold mb-6">GIAMS v1.2.0</h2>
    <p class="text-xs uppercase text-slate-400 mb-4">Role: <?= htmlspecialchars($role) ?></p>
    <nav class="space-y-2 text-sm">
        <a class="block hover:text-blue-300" href="<?= url('views/' . strtolower($role) . '/dashboard.php') ?>">Dashboard</a>
        <a class="block hover:text-blue-300" href="<?= url('api/auth/logout.php') ?>">Logout</a>
    </nav>
</aside>
