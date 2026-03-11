<?php
/**
 * GEEK-INFOTECH-SMS Session & Access Manager
 * Role-Based Access Control (RBAC) 
 */
session_start();

class Session {
    /**
     * Set session variables after successful login
     */
    public static function init($user) {
        $_SESSION['user_id']    = $user['USER_ID'];
        $_SESSION['username']   = $user['USERNAME'];
        $_SESSION['role']       = $user['ROLE'];
        $_SESSION['full_name']  = $user['FULL_NAME'];
        $_SESSION['staff_id']   = $user['STAFF_REF_ID'] ?? null;
        $_SESSION['student_id'] = $user['STUDENT_REF_ID'] ?? null;
        $_SESSION['login_time'] = time();
    }

    /**
     * ROUTING: Redirect user to their specific dashboard
     */
    public static function redirectByRole($role) {
        $path = "/geek_sms/views/";
        switch ($role) {
            case 'ADMIN':     header("Location: {$path}admin/dashboard.php"); break;
            case 'COUNSELOR': header("Location: {$path}counselor/dashboard.php"); break;
            case 'FACULTY':   header("Location: {$path}faculty/dashboard.php"); break;
            case 'STUDENT':   header("Location: {$path}student/dashboard.php"); break;
            default:          header("Location: /geek_sms/index.php?error=unauthorized");
        }
        exit();
    }

    /**
     * PROTECTION: Use this at the top of every dashboard page
     * Example: Session::protect(['ADMIN', 'FACULTY']);
     */
    public static function protect($allowedRoles = []) {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /geek_sms/index.php?error=login_required");
            exit();
        }

        if (!empty($allowedRoles) && !in_array($_SESSION['role'], $allowedRoles)) {
            // Log unauthorized access attempt if needed
            header("Location: /geek_sms/views/unauthorized.php");
            exit();
        }
    }

    public static function destroy() {
        session_unset();
        session_destroy();
        header("Location: /geek_sms/index.php?msg=logged_out");
        exit();
    }
}
