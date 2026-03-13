<?php
date_default_timezone_set('Asia/Kolkata');

define('APP_NAME', 'GEEK-INFOTECH-AMS');
define('APP_VERSION', '1.2.0');
define('ENC_KEY', 'G33k_Inf0_Secure_2026_TRINY');

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
define('BASE_URL', $protocol . ($_SERVER['HTTP_HOST'] ?? 'localhost') . '/');
define('SYS_ROOT', realpath(__DIR__ . '/..') . DIRECTORY_SEPARATOR);

class Database {
    private string $host = '127.0.0.1';
    private string $db_name = 'giams_v120';
    private string $username = 'root';
    private string $password = '';
    private static ?Database $instance = null;
    private PDO $conn;

    private function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
        $this->conn = new PDO($dsn, $this->username, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }

    public static function getInstance(): Database {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->conn;
    }
}

function db(): PDO {
    return Database::getInstance()->getConnection();
}

function url(string $path = ''): string {
    return BASE_URL . ltrim($path, '/');
}
