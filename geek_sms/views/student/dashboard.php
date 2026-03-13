<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
Session::protect([strtoupper(basename(__DIR__))]);
?>
<!doctype html><html><head><meta charset="utf-8"><script src="https://cdn.tailwindcss.com"></script><title>Dashboard</title></head>
<body class="bg-slate-100">
<div class="flex"><?php include SYS_ROOT . 'views/includes/sidebar.php'; ?><div class="flex-1 min-h-screen"><?php include SYS_ROOT . 'views/includes/topbar.php'; ?>
<main class="p-6"><div class="bg-white rounded-xl p-6 shadow-sm"><h2 class="text-xl font-bold mb-2"><?= htmlspecialchars($_SESSION['role']) ?> Dashboard</h2><p class="text-sm text-slate-600">Module workspace ready for GIAMS v1.2.0.</p></div></main>
<?php include SYS_ROOT . 'views/includes/footer.php'; ?></div></div></body></html>
