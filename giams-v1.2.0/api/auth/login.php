<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
require_once SYS_ROOT . 'core/audit.php';
require_once SYS_ROOT . 'services/AuthService.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Method not allowed'); }

$auth = new AuthService();
$user = $auth->authenticate(trim($_POST['username'] ?? ''), (string)($_POST['password'] ?? ''), (string)($_POST['role'] ?? ''));
if (!$user) {
    AuditLogger::log('LOGIN_FAILED', null, $_POST['username'] ?? null);
    header('Location: ' . url('index.php?error=invalid_credentials'));
    exit;
}
Session::init($user);
AuditLogger::log('LOGIN_SUCCESS', (int)$user['USER_ID'], $user['USERNAME']);
Session::redirectByRole($user['ROLE']);
