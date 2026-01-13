<?php
require_once __DIR__ . '/../models/Enrollment.php';
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../models/Course.php';

class EnrollmentController
{
    private $enrollmentModel;
    private $studentModel;
    private $courseModel;

    public function __construct()
    {
        $this->enrollmentModel = new Enrollment();
        $this->studentModel = new Student();
        $this->courseModel = new Course();
    }

    public function index()
    {
        $enrollments = $this->enrollmentModel->getAll();
        require __DIR__ . '/../views/enrollments/index.php';
    }

    public function create()
    {
        $students = $this->studentModel->getAll();
        $courses = $this->courseModel->All();
        require __DIR__ . '/../views/enrollments/create.php';
    }

    public function store()
    {
        $student_id = $_POST['student_id'];
        $course_id = $_POST['course_id'];

        $success = $this->enrollmentModel->create($student_id, $course_id);

        if (!$success) {
            die("Student is already enrolled in this course");
        }

        header("Location: /school_management/public/enrollments");
    }

    public function delete()
    {
        $this->enrollmentModel->delete($_GET['student_id'], $_GET['course_id']);
        header("Location: /school_management/public/enrollments");
    }
}
