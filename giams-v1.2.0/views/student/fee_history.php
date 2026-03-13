<?php require_once __DIR__ . '/../../core/config.php'; require_once SYS_ROOT . 'core/session.php'; Session::protect(['STUDENT']); ?>
<script>location.href='<?= url('api/finance/get_ledger.php') ?>';</script>
