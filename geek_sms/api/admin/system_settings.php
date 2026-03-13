<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';

Session::protect(['ADMIN']);

header('Content-Type: application/json');
echo json_encode([
    'app_name' => APP_NAME,
    'app_version' => APP_VERSION,
    'base_url' => BASE_URL,
]);
