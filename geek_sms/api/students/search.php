<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
require_once SYS_ROOT . 'services/StudentService.php';

Session::protect(['ADMIN', 'COUNSELOR', 'FACULTY']);

header('Content-Type: application/json');
$term = $_GET['q'] ?? '';

$results = (new StudentService())->search($term);
echo json_encode($results);
