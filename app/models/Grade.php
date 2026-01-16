<?php
require_once __DIR__ . '/../../config/database.php';

class Grade
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getStudentsByCourse($course_id)
    {
        $stmt = $this->db->prepare("
            SELECT students.id, users.name, grades.grade
            FROM enrollments
            JOIN students ON enrollments.student_id = students.id
            JOIN users ON students.id = users.id
            LEFT JOIN grades 
              ON grades.student_id = students.id 
             AND grades.course_id = enrollments.course_id
            WHERE enrollments.course_id = ?
        ");
        $stmt->execute([$course_id]);
        return $stmt->fetchAll();
    }

    public function save($student_id, $course_id, $grade)
    {
        $stmt = $this->db->prepare("
            REPLACE INTO grades (student_id, course_id, grade)
            VALUES (?, ?, ?)
        ");
        $stmt->execute([$student_id, $course_id, $grade]);
    }
}
