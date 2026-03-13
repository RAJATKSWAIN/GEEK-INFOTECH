<?php
require_once __DIR__ . '/../core/config.php';
require_once __DIR__ . '/../core/security.php';

class StudentService {
    private PDO $db;
    public function __construct() { $this->db = db(); }

    public function enroll(array $data): bool {
        $sql = 'INSERT INTO GIAMS_MST_STUDENTS (ADMISSION_NO,FULL_NAME,FATHER_NAME,MOTHER_NAME,MOBILE_NO,EMAIL_ID,AADHAAR_NO,COURSE_ID,ADMISSION_DATE,MAKER_ID)
                VALUES (:adm,:name,:father,:mother,:mobile,:email,:aadhaar,:course,:admission_date,:maker)';
        return $this->db->prepare($sql)->execute([
            ':adm' => $data['admission_no'],
            ':name' => $data['full_name'],
            ':father' => $data['father_name'] ?? null,
            ':mother' => $data['mother_name'] ?? null,
            ':mobile' => Security::encrypt($data['mobile_no'] ?? ''),
            ':email' => $data['email_id'] ?? null,
            ':aadhaar' => Security::encrypt($data['aadhaar_no'] ?? ''),
            ':course' => $data['course_id'] ?? null,
            ':admission_date' => $data['admission_date'],
            ':maker' => $data['maker_id'],
        ]);
    }
}
