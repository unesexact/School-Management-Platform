<?php
require_once __DIR__ . '/../../config/database.php';

class Timetable
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $sql = "
            SELECT 
                timetable.id,
                subjects.name AS subject,
                users.name AS teacher,
                timetable.day,
                timetable.start_time,
                timetable.end_time
            FROM timetable
            JOIN courses ON courses.id = timetable.course_id
            JOIN subjects ON subjects.id = courses.subject_id
            JOIN teachers ON teachers.id = courses.teacher_id
            JOIN users ON users.id = teachers.id
            ORDER BY timetable.day, timetable.start_time
        ";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($course_id, $day, $start, $end)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO timetable (course_id, day, start_time, end_time)
             VALUES (?, ?, ?, ?)"
        );

        return $stmt->execute([$course_id, $day, $start, $end]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM timetable WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // For student
    public function getForStudent($student_id)
    {
        $sql = "
            SELECT 
                subjects.name AS subject,
                users.name AS teacher,
                timetable.day,
                timetable.start_time,
                timetable.end_time
            FROM timetable
            JOIN courses ON courses.id = timetable.course_id
            JOIN enrollments ON enrollments.course_id = courses.id
            JOIN subjects ON subjects.id = courses.subject_id
            JOIN teachers ON teachers.id = courses.teacher_id
            JOIN users ON users.id = teachers.id
            WHERE enrollments.student_id = ?
            ORDER BY timetable.day, timetable.start_time
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$student_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // For teacher
    public function getForTeacher($teacher_id)
    {
        $sql = "
            SELECT 
                subjects.name AS subject,
                timetable.day,
                timetable.start_time,
                timetable.end_time
            FROM timetable
            JOIN courses ON courses.id = timetable.course_id
            JOIN subjects ON subjects.id = courses.subject_id
            WHERE courses.teacher_id = ?
            ORDER BY timetable.day, timetable.start_time
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$teacher_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
