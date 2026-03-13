<?php
require_once __DIR__ . '/config.php';

class AuditLogger {
    public static function log(string $eventType, ?int $userId = null, ?string $username = null): void {
        try {
            $sql = "INSERT INTO GIAMS_AUDIT_LOGS (EVENT_TYPE, USER_ID, USERNAME, IP_ADDRESS, USER_AGENT, REQUEST_URL)
                    VALUES (:event_type, :user_id, :username, :ip_address, :user_agent, :request_url)";

            db()->prepare($sql)->execute([
                ':event_type' => $eventType,
                ':user_id' => $userId,
                ':username' => $username,
                ':ip_address' => $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0',
                ':user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null,
                ':request_url' => $_SERVER['REQUEST_URI'] ?? null,
            ]);
        } catch (Throwable $e) {
            error_log('Audit logger failed: ' . $e->getMessage());
        }
    }
}
