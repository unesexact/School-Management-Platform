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

    // Student views his own bulletin
    public function myBulletin()
    {
        Auth::student();

        $student_id = $_SESSION['user']['id'];
        $this->showBulletin($student_id);
    }

    // Admin views bulletin of any student
    public function studentBulletin()
    {
        Auth::admin();

        if (!isset($_GET['id'])) {
            die("Student ID missing");
        }

        $this->showBulletin($_GET['id']);
    }

    private function showBulletin($student_id)
    {
        $student = $this->userModel->findById($student_id);
        $grades = $this->gradeModel->getBulletinData($student_id);

        $total = 0;
        $count = count($grades);

        foreach ($grades as $g) {
            $total += $g['grade'];
        }

        $average = $count > 0 ? round($total / $count, 2) : 0;
        $status = $average >= 10 ? 'VALIDER' : 'NON VALIDER';

        require __DIR__ . '/../views/bulletin/show.php';
    }
}
