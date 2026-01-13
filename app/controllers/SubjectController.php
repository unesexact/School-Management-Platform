<?php
require_once __DIR__ . '/../models/Subject.php';

class SubjectController
{
    private function checkAdmin()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: /school_management/public/login");
            exit;
        }
    }

    public function index()
    {
        $this->checkAdmin();
        $model = new Subject();
        $subjects = $model->all();
        require __DIR__ . '/../views/subjects/index.php';
    }

    public function create()
    {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Subject();
            $model->create($_POST['name']);
            header("Location: /school_management/public/subjects");
            exit;
        }

        require __DIR__ . '/../views/subjects/create.php';
    }

    public function delete()
    {
        $this->checkAdmin();
        $model = new Subject();
        $model->delete($_GET['id']);
        header("Location: /school_management/public/subjects");
        exit;
    }
}
