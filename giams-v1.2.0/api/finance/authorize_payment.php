<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
Session::protect(['ADMIN']);
$trx = (int)($_GET['trx_id'] ?? 0);
if (!$trx) { header('Location: ' . url('views/admin/collect_fee.php?error=invalid')); exit; }
db()->prepare('UPDATE GIAMS_FEE_LEDGER SET AUTH_ID=:auth, AUTH_DATE=NOW() WHERE TRX_ID=:trx')
  ->execute([':auth' => $_SESSION['staff_id'], ':trx' => $trx]);
header('Location: ' . url('views/admin/collect_fee.php?msg=authorized'));
