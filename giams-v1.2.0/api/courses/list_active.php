<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'services/CourseService.php';
header('Content-Type: application/json');
echo json_encode((new CourseService())->active());
