<?php
require_once __DIR__ . '/../../config/database.php';

class Course
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        return $this->db->query("
            SELECT courses.id, subjects.name AS subject_name, users.name AS teacher_name
            FROM courses
            JOIN subjects ON courses.subject_id = subjects.id
            JOIN teachers ON courses.teacher_id = teachers.id
            JOIN users ON teachers.id = users.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($subject_id, $teacher_id)
    {
        $stmt = $this->db->prepare("INSERT INTO courses (subject_id, teacher_id) VALUES (?, ?)");
        $stmt->execute([$subject_id, $teacher_id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM courses WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function getByTeacher($teacher_id)
    {
        $stmt = $this->db->prepare("
        SELECT courses.id, subjects.name
        FROM courses
        JOIN subjects ON courses.subject_id = subjects.id
        WHERE courses.teacher_id = ?
    ");
        $stmt->execute([$teacher_id]);
        return $stmt->fetchAll();
    }

    public function belongsToTeacher($course_id, $teacher_id)
    {
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM courses WHERE id = ? AND teacher_id = ?"
        );
        $stmt->execute([$course_id, $teacher_id]);
        return $stmt->fetchColumn() > 0;
    }


}