<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';

Session::protect(['ADMIN']);

$trxId = (int)($_GET['trx_id'] ?? 0);
if (!$trxId) {
    header('Location: ' . url('views/admin/collect_fee.php?error=invalid_trx'));
    exit;
}

db()->prepare('UPDATE GIAMS_FEE_LEDGER SET AUTH_ID = :auth_id, AUTH_DATE = NOW() WHERE TRX_ID = :trx_id')
    ->execute([':auth_id' => $_SESSION['staff_id'], ':trx_id' => $trxId]);

header('Location: ' . url('views/admin/collect_fee.php?msg=payment_authorized'));
