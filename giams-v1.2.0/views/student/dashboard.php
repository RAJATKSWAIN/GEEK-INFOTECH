<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
Session::protect([strtoupper(basename(__DIR__))]);
?>
<!doctype html><html><head><meta charset="utf-8"><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-slate-100"><div class="flex"><?php include SYS_ROOT . 'views/includes/sidebar.php'; ?><div class="flex-1"><?php include SYS_ROOT . 'views/includes/topbar.php'; ?><main class="p-6"><div class="bg-white rounded p-6 shadow">Role dashboard: <b><?= htmlspecialchars($_SESSION['role']) ?></b></div></main><?php include SYS_ROOT . 'views/includes/footer.php'; ?></div></div></body></html>
