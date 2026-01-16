<?php

require_once __DIR__ . '/../models/Teacher.php';
require_once __DIR__ . '/../core/Auth.php';

class TeacherController
{
    public function index()
    {
        Auth::admin();

        $teacherModel = new Teacher();
        $teachers = $teacherModel->all();

        require __DIR__ . '/../views/teachers/index.php';
    }

    public function create()
    {
        Auth::admin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teacherModel = new Teacher();
            $teacherModel->create(
                $_POST['name'],
                $_POST['email'],
                $_POST['password']
            );

            header("Location: /school_management/public/teachers");
            exit;
        }

        require __DIR__ . '/../views/teachers/create.php';
    }

    public function delete()
    {
        Auth::admin();

        $teacherModel = new Teacher();
        $teacherModel->delete($_GET['id']);

        header("Location: /school_management/public/teachers");
        exit;
    }
}
