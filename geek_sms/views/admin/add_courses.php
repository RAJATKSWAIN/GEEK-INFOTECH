<?php require_once __DIR__ . '/../../core/config.php'; require_once SYS_ROOT . 'core/session.php'; Session::protect(['ADMIN']); ?>
<!doctype html><html><body><h2>Add Course</h2><form method="post" action="<?= url('api/courses/add_course.php') ?>">
<input name="course_code" placeholder="Course code" required>
<input name="course_name" placeholder="Course name" required>
<input name="duration_months" type="number" placeholder="Duration" required>
<input name="total_fees" type="number" step="0.01" placeholder="Total fees" required>
<button type="submit">Save</button></form></body></html>
