<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
Session::protect(['ADMIN']);
$id = (int)($_GET['id'] ?? 0);
if (!$id) { header('Location: ' . url('views/admin/dashboard.php?error=invalid_id')); exit; }
db()->prepare('UPDATE GIAMS_MST_USERS SET AUTH_ID=:auth, AUTH_DATE=NOW(), IS_ACTIVE=1 WHERE USER_ID=:id')
  ->execute([':auth' => $_SESSION['staff_id'], ':id' => $id]);
header('Location: ' . url('views/admin/dashboard.php?msg=authorized'));
