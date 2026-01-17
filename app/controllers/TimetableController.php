<?php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/Timetable.php';
require_once __DIR__ . '/../models/Course.php';

class TimetableController
{
    private $model;

    public function __construct()
    {
        $this->model = new Timetable();
    }

    // ADMIN
    public function index()
    {
        Auth::admin();
        $timetables = $this->model->getAll();
        require __DIR__ . '/../views/timetable/index.php';
    }

    public function create()
    {
        Auth::admin();

        $courseModel = new Course();
        // 🔹 Use the new method to get subject + teacher names
        $courses = $courseModel->getForTimetable();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create(
                $_POST['course_id'],
                $_POST['day'],
                $_POST['start_time'],
                $_POST['end_time']
            );

            header("Location: /school_management/public/timetable");
            exit;
        }

        require __DIR__ . '/../views/timetable/create.php';
    }

    public function delete()
    {
        Auth::admin();
        $this->model->delete($_GET['id']);
        header("Location: /school_management/public/timetable");
    }

    // STUDENT
    public function student()
    {
        Auth::student();
        $data = $this->model->getForStudent($_SESSION['user']['id']);
        require __DIR__ . '/../views/timetable/student.php';
    }

    // TEACHER
    public function teacher()
    {
        Auth::teacher();
        $data = $this->model->getForTeacher($_SESSION['user']['id']);
        require __DIR__ . '/../views/timetable/teacher.php';
    }
}
