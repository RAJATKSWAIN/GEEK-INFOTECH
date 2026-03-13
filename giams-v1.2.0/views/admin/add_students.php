<?php require_once __DIR__ . '/../../core/config.php'; require_once SYS_ROOT . 'core/session.php'; Session::protect(['ADMIN','COUNSELOR']); ?>
<form method="post" action="<?= url('api/students/enroll_student.php') ?>">
<input name="admission_no" placeholder="Admission" required>
<input name="full_name" placeholder="Full Name" required>
<input name="mobile_no" placeholder="Mobile" required>
<input name="admission_date" type="date" value="<?= date('Y-m-d') ?>" required>
<button>Enroll</button>
</form>
