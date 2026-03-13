<?php
require_once __DIR__ . '/../core/config.php';
require_once __DIR__ . '/../core/security.php';

class StudentService {
    private PDO $db;

    public function __construct() {
        $this->db = db();
    }

    public function enroll(array $payload): bool {
        $sql = "INSERT INTO GIAMS_MST_STUDENTS
                (ADMISSION_NO, FULL_NAME, FATHER_NAME, MOTHER_NAME, MOBILE_NO, EMAIL_ID, AADHAAR_NO, COURSE_ID, ADMISSION_DATE, MAKER_ID)
                VALUES (:admission_no, :full_name, :father_name, :mother_name, :mobile_no, :email_id, :aadhaar_no, :course_id, :admission_date, :maker_id)";

        return $this->db->prepare($sql)->execute([
            ':admission_no' => $payload['admission_no'],
            ':full_name' => $payload['full_name'],
            ':father_name' => $payload['father_name'] ?? null,
            ':mother_name' => $payload['mother_name'] ?? null,
            ':mobile_no' => Security::encrypt($payload['mobile_no'] ?? ''),
            ':email_id' => $payload['email_id'] ?? null,
            ':aadhaar_no' => Security::encrypt($payload['aadhaar_no'] ?? ''),
            ':course_id' => $payload['course_id'] ?? null,
            ':admission_date' => $payload['admission_date'],
            ':maker_id' => $payload['maker_id'],
        ]);
    }

    public function search(string $term): array {
        $stmt = $this->db->prepare("SELECT STUDENT_ID, ADMISSION_NO, FULL_NAME, EMAIL_ID, ADMISSION_DATE, IS_ACTIVE
            FROM GIAMS_MST_STUDENTS
            WHERE FULL_NAME LIKE :term OR ADMISSION_NO LIKE :term
            ORDER BY STUDENT_ID DESC LIMIT 50");
        $stmt->execute([':term' => '%' . $term . '%']);
        return $stmt->fetchAll();
    }
}
