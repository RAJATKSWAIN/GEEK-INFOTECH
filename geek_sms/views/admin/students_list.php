<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
Session::protect(['ADMIN']);
$students = db()->query('SELECT STUDENT_ID, ADMISSION_NO, FULL_NAME, IS_ACTIVE FROM GIAMS_MST_STUDENTS ORDER BY STUDENT_ID DESC LIMIT 100')->fetchAll();
?>
<!doctype html><html><body><h2>Students List</h2><table border="1"><tr><th>ID</th><th>Admission</th><th>Name</th><th>Status</th></tr><?php foreach($students as $s): ?><tr><td><?= $s['STUDENT_ID'] ?></td><td><?= htmlspecialchars($s['ADMISSION_NO']) ?></td><td><?= htmlspecialchars($s['FULL_NAME']) ?></td><td><?= $s['IS_ACTIVE']?'ACTIVE':'PENDING' ?></td></tr><?php endforeach; ?></table></body></html>
