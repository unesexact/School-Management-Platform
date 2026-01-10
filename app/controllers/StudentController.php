<?php
require_once __DIR__ . '/../models/Student.php';

class StudentController
{
    private $model;

    public function __construct()
    {
        $this->model = new Student();
    }

    private function checkAdmin()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: /school_management/public/login");
            exit;
        }
    }

    public function index()
    {
        $this->checkAdmin();
        $students = $this->model->getAll();
        require __DIR__ . '/../views/students/index.php';
    }

    public function create()
    {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create(
                $_POST['name'],
                $_POST['email'],
                $_POST['password']
            );
            header("Location: /school_management/public/students");
            exit;
        }

        require __DIR__ . '/../views/students/create.php';
    }

    public function delete()
    {
        $this->checkAdmin();
        $this->model->delete($_GET['id']);
        header("Location: /school_management/public/students");
    }
}
