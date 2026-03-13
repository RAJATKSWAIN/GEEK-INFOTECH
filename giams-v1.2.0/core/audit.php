<?php
require_once __DIR__ . '/config.php';

class AuditLogger {
    public static function log(string $eventType, ?int $userId = null, ?string $username = null): void {
        $sql = 'INSERT INTO GIAMS_AUDIT_LOGS (EVENT_TYPE, USER_ID, USERNAME, IP_ADDRESS, USER_AGENT, REQUEST_URL) VALUES (:e,:u,:n,:ip,:ua,:url)';
        db()->prepare($sql)->execute([
            ':e' => $eventType,
            ':u' => $userId,
            ':n' => $username,
            ':ip' => $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0',
            ':ua' => $_SERVER['HTTP_USER_AGENT'] ?? null,
            ':url' => $_SERVER['REQUEST_URI'] ?? null,
        ]);
    }
}
