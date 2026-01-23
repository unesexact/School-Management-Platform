<?php
require_once __DIR__ . '/../../core/Auth.php';
require_once __DIR__ . '/../../models/Course.php';
require_once __DIR__ . '/../../models/Timetable.php';

Auth::teacher();

$teacher_id = $_SESSION['user']['id'];

$courseModel = new Course();
$timetableModel = new Timetable();

$totalCourses = count($courseModel->getByTeacher($teacher_id));
$totalTimetable = count($timetableModel->getForTeacher($teacher_id));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Teacher Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f5f6fa;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Teacher Dashboard</h2>
                <p class="text-muted">Welcome <?= htmlspecialchars($_SESSION['user']['name']) ?></p>
            </div>
            <a href="/school_management/public/index.php/logout" class="btn btn-danger">
                Logout
            </a>
        </div>

        <!-- Cards -->
        <div class="row g-4 mb-4">

            <!-- My Courses / Grades -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5 class="text-primary">My Courses</h5>
                    <h2><?= $totalCourses ?></h2>
                    <a href="/school_management/public/grades" class="btn btn-primary btn-sm mt-2">
                        Manage Grades
                    </a>
                </div>
            </div>

            <!-- Timetable -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5 class="text-success">Timetable</h5>
                    <h2><?= $totalTimetable ?></h2>
                    <a href="/school_management/public/timetable/teacher" class="btn btn-success btn-sm mt-2">
                        View Timetable
                    </a>
                </div>
            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="/school_management/public/assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>