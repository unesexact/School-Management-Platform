<?php

require_once __DIR__ . '/../models/Teacher.php';

class TeacherController
{
    private function checkAdmin()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: /school_management/public/index.php/login");
            exit;
        }
    }

    public function index()
    {
        $this->checkAdmin();
        $teacherModel = new Teacher();
        $teachers = $teacherModel->all();
        require __DIR__ . '/../views/teachers/index.php';
    }

    public function create()
    {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teacherModel = new Teacher();
            $teacherModel->create($_POST['name'], $_POST['email'], $_POST['password']);
            header("Location: /school_management/public/teachers");
            exit;
        }

        require __DIR__ . '/../views/teachers/create.php';
    }

    public function delete()
    {
        $this->checkAdmin();
        $teacherModel = new Teacher();
        $teacherModel->delete($_GET['id']);
        header("Location: /school_management/public/teachers");
        exit;
    }
}
