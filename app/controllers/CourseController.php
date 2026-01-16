<?php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Subject.php';
require_once __DIR__ . '/../models/Teacher.php';

class CourseController
{
    // Admin: list courses
    public function index()
    {
        Auth::admin();

        $courseModel = new Course();
        $courses = $courseModel->getAll();

        require __DIR__ . '/../views/courses/index.php';
    }

    // Admin: create course
    public function create()
    {
        Auth::admin();

        $subjectModel = new Subject();
        $teacherModel = new Teacher();

        $subjects = $subjectModel->all();
        $teachers = $teacherModel->all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $courseModel = new Course();
            $courseModel->create(
                $_POST['subject_id'],
                $_POST['teacher_id']
            );

            header("Location: /school_management/public/courses");
            exit;
        }

        require __DIR__ . '/../views/courses/create.php';
    }

    // Admin: delete course
    public function delete()
    {
        Auth::admin();

        $courseModel = new Course();
        $courseModel->delete($_GET['id']);

        header("Location: /school_management/public/courses");
        exit;
    }
}
