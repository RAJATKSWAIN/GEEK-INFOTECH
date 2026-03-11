<?php
/**
 * GEEK-INFOTECH-SMS Login API
 * Receives credentials, verifies via Service, and sets Session
 */

require_once __DIR__ . '/../../core/config.php';
require_once __DIR__ . '/../../core/security.php';
require_once __DIR__ . '/../../core/session.php';
require_once __DIR__ . '/../../services/AuthService.php';

// 1. Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../index.php?error=invalid_request");
    exit();
}

// 2. Sanitize Inputs
$username = Security::clean($_POST['username'] ?? '');
$password = $_POST['password'] ?? ''; // Don't clean passwords (can contain special chars)

if (empty($username) || empty($password)) {
    header("Location: ../../index.php?error=empty_fields");
    exit();
}

// 3. Authenticate using Service
$authService = new AuthService();
$user = $authService->authenticate($username, $password);

if ($user) {
    // 4. If credentials are valid, initialize the Session
    // $user contains DB columns: USER_ID, USERNAME, ROLE, STAFF_REF_ID, etc.
    Session::init($user);

    // 5. Redirect to the appropriate dashboard
    Session::redirectByRole($user['ROLE']);
} else {
    // 6. Failed login (Wrong password or Inactive account)
    header("Location: ../../index.php?error=login_failed");
    exit();
}
