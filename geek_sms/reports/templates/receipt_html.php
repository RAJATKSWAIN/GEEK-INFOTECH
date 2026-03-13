<?php /** @var array $receipt */ ?>
<div>
  <h2>Fee Receipt</h2>
  <p>Receipt No: <?= htmlspecialchars($receipt['RECEIPT_NO'] ?? '') ?></p>
  <p>Amount: <?= htmlspecialchars($receipt['AMOUNT_PAID'] ?? '') ?></p>
</div>
