<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
require_once SYS_ROOT . 'services/CourseService.php';
Session::protect(['ADMIN']);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Method not allowed'); }
(new CourseService())->add([
  'course_code' => $_POST['course_code'] ?? '',
  'course_name' => $_POST['course_name'] ?? '',
  'duration_months' => $_POST['duration_months'] ?? 0,
  'total_fees' => $_POST['total_fees'] ?? 0,
  'maker_id' => $_SESSION['staff_id'],
]);
header('Location: ' . url('views/admin/add_courses.php?msg=saved'));
