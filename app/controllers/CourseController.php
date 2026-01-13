<?php
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Subject.php';
require_once __DIR__ . '/../models/Teacher.php';

class CourseController
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
        $courseModel = new Course();
        $courses = $courseModel->all();
        require __DIR__ . '/../views/courses/index.php';
    }

    public function create()
    {
        $this->checkAdmin();
        $subjectModel = new Subject();
        $teacherModel = new Teacher();

        $subjects = $subjectModel->all();
        $teachers = $teacherModel->all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $courseModel = new Course();
            $courseModel->create($_POST['subject_id'], $_POST['teacher_id']);
            header("Location: /school_management/public/courses");
            exit;
        }

        require __DIR__ . '/../views/courses/create.php';
    }

    public function delete()
    {
        $this->checkAdmin();
        $courseModel = new Course();
        $courseModel->delete($_GET['id']);
        header("Location: /school_management/public/courses");
        exit;
    }
}
