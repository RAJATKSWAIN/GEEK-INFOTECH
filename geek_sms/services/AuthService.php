<?php
/**
 * GEEK-INFOTECH-AMS Authentication Service
 * Handles Login, Audit Updates, and Security Checks
 * CLASS: AuthService
 * PURPOSE: Handles user authentication, credential verification, and login audits.
 */

require_once __DIR__ . '/../core/config.php';

class AuthService {

    /**
     * PROPERTY: Database Connection
     */
    private $db;

    /**
     * PUBLIC FUNCTION: __construct
     * Initializes the DB helper.
     */
    public function __construct() {
        $this->db = db();
    }

    /**
     * PUBLIC FUNCTION: authenticate
     * PURPOSE: Verifies credentials against hashed database records.
     * @param string $username, $password, $role
     */
    public function authenticate($username, $password, $role) {
        try {
            // 1. Fetch user data using GIAMS_ prefix
            $sql = "SELECT u.*, s.FULL_NAME as STAFF_NAME, st.FULL_NAME as STUDENT_NAME 
                    FROM GIAMS_MST_USERS u
                    LEFT JOIN GIAMS_MST_STAFF s ON u.STAFF_REF_ID = s.STAFF_ID
                    LEFT JOIN GIAMS_MST_STUDENTS st ON u.STUDENT_REF_ID = st.STUDENT_ID
                    WHERE u.USERNAME = :username AND u.ROLE = :role AND u.IS_ACTIVE = 1";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':role'     => $role
            ]);
            $user = $stmt->fetch();

            // 2. Verify Hashed Password
            if ($user && password_verify($password, $user['PASSWORD_HASH'])) {
                
                // 3. Update Audit Metadata
                $this->updateLoginAudit($user['USER_ID']);
                
                // 4. Set Display Name (Staff Name > Student Name > Username)
                $user['DISPLAY_NAME'] = $user['STAFF_NAME'] ?? $user['STUDENT_NAME'] ?? $user['USERNAME'];
                
                return $user;
            }

            return false; // Authentication failed

        } catch (PDOException $e) {
            error_log("AuthService Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * PRIVATE FUNCTION: updateLoginAudit
     * PURPOSE: Records the User's IP and Timestamp on successful login.
     */
    private function updateLoginAudit($userId) {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        $sql = "UPDATE GIAMS_MST_USERS 
                SET LAST_LOGIN_AT = NOW(), 
                    LAST_LOGIN_IP = :ip 
                WHERE USER_ID = :id";
        
        $this->db->prepare($sql)->execute([
            ':ip' => $ip,
            ':id' => $userId
        ]);
    }

    /**
     * PUBLIC FUNCTION: isUsernameExists
     * PURPOSE: Checks for duplicate usernames during registration.
     */
    public function isUsernameExists($username) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM GIAMS_MST_USERS WHERE USERNAME = ?");
        $stmt->execute([$username]);
        return $stmt->fetchColumn() > 0;
    }
}
