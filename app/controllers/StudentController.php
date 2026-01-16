<?php
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../core/Auth.php';

class StudentController
{
    private $model;

    public function __construct()
    {
        $this->model = new Student();
    }

    public function index()
    {
        Auth::admin();

        $students = $this->model->getAll();
        require __DIR__ . '/../views/students/index.php';
    }

    public function create()
    {
        Auth::admin();

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
        Auth::admin();

        $this->model->delete($_GET['id']);
        header("Location: /school_management/public/students");
        exit;
    }
}
