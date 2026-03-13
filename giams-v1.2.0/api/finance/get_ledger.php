<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
Session::protect(['ADMIN','STUDENT']);
$studentId = $_SESSION['role'] === 'STUDENT' ? (int)$_SESSION['student_id'] : (int)($_GET['student_id'] ?? 0);
$stmt = db()->prepare('SELECT l.* FROM GIAMS_FEE_LEDGER l JOIN GIAMS_FEE_MASTER m ON m.FEE_ID=l.FEE_ID WHERE m.STUDENT_ID=:id ORDER BY l.TRX_ID DESC');
$stmt->execute([':id' => $studentId]);
header('Content-Type: application/json');
echo json_encode($stmt->fetchAll());
