<?php
require_once __DIR__ . '/../core/config.php';

class CourseService {
    private PDO $db;

    public function __construct() {
        $this->db = db();
    }

    public function add(array $payload): bool {
        $sql = "INSERT INTO GIAMS_MST_COURSES
                (COURSE_CODE, COURSE_NAME, DURATION_MONTHS, TOTAL_FEES, MAKER_ID)
                VALUES (:course_code, :course_name, :duration_months, :total_fees, :maker_id)";

        return $this->db->prepare($sql)->execute([
            ':course_code' => $payload['course_code'],
            ':course_name' => $payload['course_name'],
            ':duration_months' => $payload['duration_months'],
            ':total_fees' => $payload['total_fees'],
            ':maker_id' => $payload['maker_id'],
        ]);
    }

    public function active(): array {
        return $this->db->query("SELECT * FROM GIAMS_MST_COURSES WHERE IS_ACTIVE = 1 ORDER BY COURSE_NAME ASC")->fetchAll();
    }
}
