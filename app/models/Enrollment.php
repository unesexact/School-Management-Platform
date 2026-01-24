<?php
require_once __DIR__ . '/../../config/database.php';

class Enrollment
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT 
                    students.id AS student_id,
                    users.name AS student_name,
                    subjects.name AS subject_name,
                    courses.id AS course_id
                FROM enrollments
                JOIN students ON enrollments.student_id = students.id
                JOIN users ON students.id = users.id
                JOIN courses ON enrollments.course_id = courses.id
                JOIN subjects ON courses.subject_id = subjects.id";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($student_id, $course_id)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO enrollments (student_id, course_id) VALUES (?, ?)"
        );
        return $stmt->execute([$student_id, $course_id]);
    }


    public function delete($student_id, $course_id)
    {
        $stmt = $this->db->prepare("DELETE FROM enrollments WHERE student_id=? AND course_id=?");
        $stmt->execute([$student_id, $course_id]);
    }

    public function getByStudent($student_id)
    {
        $stmt = $this->db->prepare("
        SELECT enrollments.*
        FROM enrollments
        WHERE enrollments.student_id = ?
    ");
        $stmt->execute([$student_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isAlreadyEnrolled($student_id, $course_id)
    {
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM enrollments WHERE student_id = ? AND course_id = ?"
        );
        $stmt->execute([$student_id, $course_id]);
        return $stmt->fetchColumn() > 0;
    }

}
