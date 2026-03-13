<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
require_once SYS_ROOT . 'services/FinanceService.php';

Session::protect(['ADMIN', 'STUDENT']);
header('Content-Type: application/json');

$studentId = isset($_GET['student_id']) ? (int)$_GET['student_id'] : (int)($_SESSION['student_id'] ?? 0);
if ($_SESSION['role'] === 'STUDENT') {
    $studentId = (int)$_SESSION['student_id'];
}

echo json_encode((new FinanceService())->ledger($studentId));
