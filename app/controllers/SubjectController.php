<?php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/Subject.php';

class SubjectController
{
    // Admin: list subjects
    public function index()
    {
        Auth::admin();

        $model = new Subject();
        $subjects = $model->all();

        require __DIR__ . '/../views/subjects/index.php';
    }

    // Admin: create subject
    public function create()
    {
        Auth::admin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Subject();
            $model->create($_POST['name']);

            header("Location: /school_management/public/subjects");
            exit;
        }

        require __DIR__ . '/../views/subjects/create.php';
    }

    // Admin: delete subject
    public function delete()
    {
        Auth::admin();

        $model = new Subject();
        $model->delete($_GET['id']);

        header("Location: /school_management/public/subjects");
        exit;
    }
}
