<?php
require_once __DIR__ . '/../../config/database.php';

class Course
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function all()
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
}