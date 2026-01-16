<?php
require_once __DIR__ . '/../core/Auth.php';
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

    // Admin: List enrollments
    public function index()
    {
        Auth::admin();

        $enrollments = $this->enrollmentModel->getAll();
        require __DIR__ . '/../views/enrollments/index.php';
    }

    // Admin: Create enrollment
    public function create()
    {
        Auth::admin();

        $students = $this->studentModel->getAll();
        $courses = $this->courseModel->getAll();

        require __DIR__ . '/../views/enrollments/create.php';
    }

    // Admin: Store enrollment
    public function store()
    {
        Auth::admin(); // 🔐 FIXED

        $student_id = $_POST['student_id'];
        $course_id = $_POST['course_id'];

        $success = $this->enrollmentModel->create($student_id, $course_id);

        if (!$success) {
            header("Location: /school_management/public/enrollments?error=duplicate");
            exit;
        }

        header("Location: /school_management/public/enrollments");
        exit;
    }

    // Admin: Delete enrollment
    public function delete()
    {
        Auth::admin();

        $this->enrollmentModel->delete(
            $_GET['student_id'],
            $_GET['course_id']
        );

        header("Location: /school_management/public/enrollments");
        exit;
    }
}
