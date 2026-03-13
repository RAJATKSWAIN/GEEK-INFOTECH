<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
Session::protect(['STUDENT']);
?>
<!doctype html><html><body><script>location.href='<?= url('api/finance/get_ledger.php') ?>';</script></body></html>
