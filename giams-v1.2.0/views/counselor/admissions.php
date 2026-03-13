<?php require_once __DIR__ . '/../../core/config.php'; require_once SYS_ROOT . 'core/session.php'; Session::protect(['COUNSELOR']); ?>
<h2>Counselor Admissions</h2>
<a href="<?= url('views/admin/add_students.php') ?>">Enroll Student</a>
