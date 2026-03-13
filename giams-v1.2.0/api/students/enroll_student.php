<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
require_once SYS_ROOT . 'services/StudentService.php';
Session::protect(['ADMIN', 'COUNSELOR']);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Method not allowed'); }
(new StudentService())->enroll([
  'admission_no' => $_POST['admission_no'] ?? '',
  'full_name' => $_POST['full_name'] ?? '',
  'mobile_no' => $_POST['mobile_no'] ?? '',
  'admission_date' => $_POST['admission_date'] ?? date('Y-m-d'),
  'course_id' => $_POST['course_id'] ?? null,
  'maker_id' => $_SESSION['staff_id'],
]);
header('Location: ' . url('views/admin/add_students.php?msg=saved'));
