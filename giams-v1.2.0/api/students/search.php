<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
Session::protect(['ADMIN','COUNSELOR','FACULTY']);
$q = '%' . ($_GET['q'] ?? '') . '%';
$stmt = db()->prepare('SELECT STUDENT_ID,ADMISSION_NO,FULL_NAME FROM GIAMS_MST_STUDENTS WHERE FULL_NAME LIKE :q OR ADMISSION_NO LIKE :q LIMIT 50');
$stmt->execute([':q' => $q]);
header('Content-Type: application/json');
echo json_encode($stmt->fetchAll());
