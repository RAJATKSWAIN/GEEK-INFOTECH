<?php
require_once __DIR__ . '/../core/config.php';
require_once SYS_ROOT . 'core/session.php';
Session::protect(['ADMIN']);

$rows = db()->query('SELECT ADMISSION_NO, FULL_NAME, EMAIL_ID FROM GIAMS_MST_STUDENTS ORDER BY STUDENT_ID DESC')->fetchAll();
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="students.csv"');
$out = fopen('php://output', 'w');
fputcsv($out, ['ADMISSION_NO', 'FULL_NAME', 'EMAIL_ID']);
foreach ($rows as $row) {
    fputcsv($out, $row);
}
fclose($out);
