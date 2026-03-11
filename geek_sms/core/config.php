<?php
/**
 * GEEK-INFOTECH-SMS-V1.0.0
 * Database Connection - PDO Singleton
 * Localization: Asia/Kolkata
 */

class Database {
    private $host     = "sql100.infinityfree.com";
    private $db_name  = "if0_40254012_geek_sms"; 
    private $username = "if0_40254012";
    private $password = "Geekinfo2025";
    private $port     = "3306";
    
    public $conn;
    private static $instance;

    private function __construct() {
        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES    => false,
            ];

            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            
            // Force IST Timezone
            $this->conn->exec("SET time_zone = '+05:30'");

        } catch (PDOException $e) {
            // Log error in production; for now, we die for debugging
            die("Connection Error: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}

// Global helper function for Service layer
function db() {
    return Database::getInstance()->getConnection();
}
