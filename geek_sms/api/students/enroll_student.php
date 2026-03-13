<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
require_once SYS_ROOT . 'services/StudentService.php';

Session::protect(['ADMIN', 'COUNSELOR']);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed');
}

$payload = [
    'admission_no' => $_POST['admission_no'] ?? '',
    'full_name' => $_POST['full_name'] ?? '',
    'father_name' => $_POST['father_name'] ?? null,
    'mother_name' => $_POST['mother_name'] ?? null,
    'mobile_no' => $_POST['mobile_no'] ?? '',
    'email_id' => $_POST['email_id'] ?? null,
    'aadhaar_no' => $_POST['aadhaar_no'] ?? null,
    'course_id' => $_POST['course_id'] ?? null,
    'admission_date' => $_POST['admission_date'] ?? date('Y-m-d'),
    'maker_id' => $_SESSION['staff_id'],
];

$service = new StudentService();
$service->enroll($payload);

header('Location: ' . url('views/admin/add_students.php?msg=student_enrolled'));
