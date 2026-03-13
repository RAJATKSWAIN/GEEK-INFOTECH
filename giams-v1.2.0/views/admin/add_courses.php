<?php require_once __DIR__ . '/../../core/config.php'; require_once SYS_ROOT . 'core/session.php'; Session::protect(['ADMIN']); ?>
<form method="post" action="<?= url('api/courses/add_course.php') ?>">
<input name="course_code" placeholder="Code" required>
<input name="course_name" placeholder="Name" required>
<input name="duration_months" type="number" required>
<input name="total_fees" type="number" step="0.01" required>
<button>Add</button>
</form>
