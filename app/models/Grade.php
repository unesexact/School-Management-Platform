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

    public function getStudentGrades($student_id)
    {
        $stmt = $this->db->prepare("
        SELECT subjects.name AS subject, grades.grade
        FROM grades
        JOIN courses ON grades.course_id = courses.id
        JOIN subjects ON courses.subject_id = subjects.id
        WHERE grades.student_id = ?
    ");
        $stmt->execute([$student_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBulletinData($student_id)
    {
        $sql = "
        SELECT 
            subjects.name AS subject,
            users.name AS teacher,
            grades.grade
        FROM grades
        JOIN courses ON grades.course_id = courses.id
        JOIN subjects ON courses.subject_id = subjects.id
        JOIN users ON courses.teacher_id = users.id
        WHERE grades.student_id = ?
    ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$student_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGradesByStudent($student_id)
    {
        $sql = "
        SELECT 
            subjects.name AS subject,
            users.name AS teacher,
            grades.grade
        FROM grades
        JOIN courses ON grades.course_id = courses.id
        JOIN subjects ON courses.subject_id = subjects.id
        JOIN users ON courses.teacher_id = users.id
        WHERE grades.student_id = ?
    ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$student_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}
