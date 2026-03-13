<?php
require_once __DIR__ . '/../core/config.php';

class AuthService {
    private PDO $db;
    public function __construct() { $this->db = db(); }

    public function authenticate(string $username, string $password, string $role) {
        $sql = "SELECT u.*, s.FULL_NAME AS STAFF_NAME, st.FULL_NAME AS STUDENT_NAME
                FROM GIAMS_MST_USERS u
                LEFT JOIN GIAMS_MST_STAFF s ON u.STAFF_REF_ID = s.STAFF_ID
                LEFT JOIN GIAMS_MST_STUDENTS st ON u.STUDENT_REF_ID = st.STUDENT_ID
                WHERE u.USERNAME = :username AND u.ROLE = :role AND u.IS_ACTIVE = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':username' => $username, ':role' => strtoupper($role)]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['PASSWORD_HASH'])) {
            $user['DISPLAY_NAME'] = $user['STAFF_NAME'] ?: ($user['STUDENT_NAME'] ?: $user['USERNAME']);
            return $user;
        }
        return false;
    }
}
