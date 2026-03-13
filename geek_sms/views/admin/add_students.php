<?php require_once __DIR__ . '/../../core/config.php'; require_once SYS_ROOT . 'core/session.php'; Session::protect(['ADMIN','COUNSELOR']); ?>
<!doctype html><html><body><h2>Enroll Student</h2><form method="post" action="<?= url('api/students/enroll_student.php') ?>">
<input name="admission_no" placeholder="Admission no" required>
<input name="full_name" placeholder="Full name" required>
<input name="mobile_no" placeholder="Mobile" required>
<input name="admission_date" type="date" value="<?= date('Y-m-d') ?>" required>
<input name="course_id" type="number" placeholder="Course ID">
<button type="submit">Enroll</button></form></body></html>
