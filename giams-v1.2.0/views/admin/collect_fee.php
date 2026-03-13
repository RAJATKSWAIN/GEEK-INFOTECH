<?php require_once __DIR__ . '/../../core/config.php'; require_once SYS_ROOT . 'core/session.php'; Session::protect(['ADMIN']); ?>
<form method="post" action="<?= url('api/finance/collect_fee.php') ?>">
<input name="fee_id" type="number" required>
<input name="receipt_no" required>
<input name="payment_date" type="date" value="<?= date('Y-m-d') ?>" required>
<input name="amount_paid" type="number" step="0.01" required>
<select name="payment_mode"><option>CASH</option><option>UPI</option><option>BANK_TRANSFER</option><option>CHEQUE</option></select>
<button>Collect</button>
</form>
