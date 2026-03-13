<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
Session::protect(['STUDENT']);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Method not allowed'); }
db()->prepare('UPDATE GIAMS_MST_STUDENTS SET EMAIL_ID=:email WHERE STUDENT_ID=:id')
  ->execute([':email' => $_POST['email_id'] ?? null, ':id' => $_SESSION['student_id']]);
header('Location: ' . url('views/student/dashboard.php?msg=updated'));
