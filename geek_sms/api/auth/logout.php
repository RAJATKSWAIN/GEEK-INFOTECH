<?php
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';
require_once SYS_ROOT . 'core/audit.php';

AuditLogger::log('LOGOUT', $_SESSION['user_id'] ?? null, $_SESSION['username'] ?? null);
Session::destroy();
