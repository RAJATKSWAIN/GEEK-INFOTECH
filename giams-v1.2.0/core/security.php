<?php
class Security {
    private static string $cipher = 'aes-256-cbc';

    public static function clean($data) {
        if (is_array($data)) {
            return array_map([self::class, 'clean'], $data);
        }
        return htmlspecialchars(strip_tags(trim((string)$data)), ENT_QUOTES, 'UTF-8');
    }

    public static function encrypt(string $data): string {
        if ($data === '') return '';
        $ivLen = openssl_cipher_iv_length(self::$cipher);
        $iv = openssl_random_pseudo_bytes($ivLen);
        $encrypted = openssl_encrypt($data, self::$cipher, ENC_KEY, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }

    public static function decrypt(string $data): string {
        if ($data === '') return '';
        $decoded = base64_decode($data, true);
        if (!$decoded || strpos($decoded, '::') === false) return $data;
        [$encrypted, $iv] = explode('::', $decoded, 2);
        return (string)openssl_decrypt($encrypted, self::$cipher, ENC_KEY, 0, $iv);
    }
}
