<?php
require_once __DIR__ . '/../../config/database.php';

class Student
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT users.id, users.name, users.email 
                FROM users 
                JOIN students ON users.id = students.id
                ORDER BY users.name";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $email, $password)
    {
        // 1. Insert into users
        $stmt = $this->db->prepare(
            "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'student')"
        );
        $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);

        $userId = $this->db->lastInsertId();

        // 2. Insert into students
        $stmt = $this->db->prepare("INSERT INTO students (id) VALUES (?)");
        return $stmt->execute([$userId]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function search($keyword)
    {
        $stmt = $this->db->prepare("
        SELECT students.*, users.name, users.email
        FROM students
        JOIN users ON students.id = users.id
        WHERE users.name LIKE ? OR users.email LIKE ?
    ");
        $stmt->execute(["%$keyword%", "%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
