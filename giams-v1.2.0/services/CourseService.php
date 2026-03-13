<?php
require_once __DIR__ . '/../core/config.php';

class CourseService {
    private PDO $db;
    public function __construct() { $this->db = db(); }

    public function add(array $data): bool {
        $sql = 'INSERT INTO GIAMS_MST_COURSES (COURSE_CODE,COURSE_NAME,DURATION_MONTHS,TOTAL_FEES,MAKER_ID) VALUES (:code,:name,:months,:fees,:maker)';
        return $this->db->prepare($sql)->execute([
            ':code' => $data['course_code'],
            ':name' => $data['course_name'],
            ':months' => (int)$data['duration_months'],
            ':fees' => (float)$data['total_fees'],
            ':maker' => $data['maker_id'],
        ]);
    }

    public function active(): array {
        return $this->db->query('SELECT * FROM GIAMS_MST_COURSES WHERE IS_ACTIVE = 1 ORDER BY COURSE_NAME')->fetchAll();
    }
}
