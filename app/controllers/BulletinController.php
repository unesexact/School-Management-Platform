<?php
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Grade.php';

class BulletinController
{
    private $gradeModel;
    private $userModel;

    public function __construct()
    {
        $this->gradeModel = new Grade();
        $this->userModel = new User();
    }

    public function index()
    {
        Auth::admin();

        $students = $this->userModel->getAllStudents();
        require __DIR__ . '/../views/bulletin/index.php';
    }


    // ONE entry point
    public function show()
    {
        Auth::check();

        if ($_SESSION['user']['role'] === 'student') {
            $student_id = $_SESSION['user']['id'];
        } else {
            if (!isset($_GET['student_id'])) {
                die("Student ID is required");
            }
            $student_id = $_GET['student_id'];
        }

        $student = $this->userModel->findById($student_id);
        $grades = $this->gradeModel->getBulletinData($student_id);

        $total = 0;
        $count = count($grades);

        foreach ($grades as $g) {
            $total += $g['grade'];
        }

        $average = $count > 0 ? round($total / $count, 2) : 0;
        $status = $average >= 10 ? 'VALIDÉ' : 'NON VALIDÉ';

        require __DIR__ . '/../views/bulletin/show.php';
    }
}
