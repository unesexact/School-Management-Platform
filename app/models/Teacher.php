<?php

require_once __DIR__ . '/../../config/database.php';

class Teacher
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function all()
    {
        return $this->db->query("
            SELECT users.id, users.name, users.email
            FROM teachers
            JOIN users ON teachers.id = users.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $email, $password)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'teacher')"
        );
        $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);

        $userId = $this->db->lastInsertId();

        $stmt = $this->db->prepare("INSERT INTO teachers (id) VALUES (?)");
        $stmt->execute([$userId]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }
}
