<?php
require_once __DIR__ . '/../../config/database.php';

class Subject
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function all()
    {
        return $this->db->query("SELECT * FROM subjects")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name)
    {
        $stmt = $this->db->prepare("INSERT INTO subjects (name) VALUES (?)");
        $stmt->execute([$name]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM subjects WHERE id = ?");
        $stmt->execute([$id]);
    }
}
