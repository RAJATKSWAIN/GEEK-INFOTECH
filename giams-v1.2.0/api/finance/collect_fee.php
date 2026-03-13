<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
require_once SYS_ROOT . 'services/FinanceService.php';
Session::protect(['ADMIN']);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Method not allowed'); }
(new FinanceService())->collectFee([
  'fee_id' => (int)($_POST['fee_id'] ?? 0),
  'receipt_no' => $_POST['receipt_no'] ?? '',
  'payment_date' => $_POST['payment_date'] ?? date('Y-m-d'),
  'amount_paid' => (float)($_POST['amount_paid'] ?? 0),
  'payment_mode' => $_POST['payment_mode'] ?? 'CASH',
  'remarks' => $_POST['remarks'] ?? null,
  'maker_id' => $_SESSION['staff_id'],
]);
header('Location: ' . url('views/admin/collect_fee.php?msg=done'));
