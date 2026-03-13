<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
Session::protect(['COUNSELOR']);
?>
<!doctype html><html><body><h2>Counselor Admissions</h2><p>Use API endpoint <code><?= url('api/students/enroll_student.php') ?></code> for admissions.</p></body></html>
