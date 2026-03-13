<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Session {
    public static function init(array $user): void {
        $_SESSION['user_id'] = $user['USER_ID'];
        $_SESSION['username'] = $user['USERNAME'];
        $_SESSION['role'] = strtoupper($user['ROLE']);
        $_SESSION['full_name'] = $user['DISPLAY_NAME'] ?? $user['USERNAME'];
        $_SESSION['staff_id'] = $user['STAFF_REF_ID'] ?? null;
        $_SESSION['student_id'] = $user['STUDENT_REF_ID'] ?? null;
        session_regenerate_id(true);
    }

    public static function protect(array $allowed = []): void {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . url('index.php?error=login_required'));
            exit;
        }
        if ($allowed && !in_array($_SESSION['role'] ?? '', $allowed, true)) {
            header('Location: ' . url('views/unauthorized.php'));
            exit;
        }
    }

    public static function redirectByRole(string $role): void {
        $role = strtoupper($role);
        $routes = [
            'ADMIN' => 'views/admin/dashboard.php',
            'COUNSELOR' => 'views/counselor/dashboard.php',
            'FACULTY' => 'views/faculty/dashboard.php',
            'STUDENT' => 'views/student/dashboard.php',
        ];
        header('Location: ' . url($routes[$role] ?? 'index.php?error=unauthorized_role'));
        exit;
    }

    public static function destroy(): void {
        $_SESSION = [];
        session_destroy();
        header('Location: ' . url('index.php?msg=logged_out'));
        exit;
    }
}
