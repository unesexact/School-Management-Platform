<?php
require_once __DIR__ . '/../../core/Auth.php';
require_once __DIR__ . '/../../models/Student.php';
require_once __DIR__ . '/../../models/Teacher.php';
require_once __DIR__ . '/../../models/Course.php';
require_once __DIR__ . '/../../models/Subject.php';
require_once __DIR__ . '/../../models/Enrollment.php';

Auth::admin();

$studentModel = new Student();
$teacherModel = new Teacher();
$courseModel = new Course();
$subjectModel = new Subject();
$enrollmentModel = new Enrollment();

$totalStudents = count($studentModel->getAll());
$totalTeachers = count($teacherModel->all());
$totalCourses = count($courseModel->getAll());
$totalSubjects = count($subjectModel->all());
$totalEnrollments = count($enrollmentModel->getAll());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

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
                <h2 class="fw-bold">Admin Dashboard</h2>
                <p class="text-muted">Welcome <?= htmlspecialchars($_SESSION['user']['name']) ?></p>
            </div>
            <a href="/school_management/public/index.php/logout" class="btn btn-danger">
                Logout
            </a>
        </div>

        <!-- Cards -->
        <div class="row g-4">

            <!-- Students -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5 class="text-primary">Students</h5>
                    <h2><?= $totalStudents ?></h2>
                    <a href="/school_management/public/students" class="btn btn-primary btn-sm mt-2">Manage</a>
                </div>
            </div>

            <!-- Teachers -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5 class="text-success">Teachers</h5>
                    <h2><?= $totalTeachers ?></h2>
                    <a href="/school_management/public/teachers" class="btn btn-success btn-sm mt-2">Manage</a>
                </div>
            </div>

            <!-- Subjects -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5 class="text-warning">Subjects</h5>
                    <h2><?= $totalSubjects ?></h2>
                    <a href="/school_management/public/subjects" class="btn btn-warning btn-sm mt-2">Manage</a>
                </div>
            </div>

            <!-- Courses -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5 class="text-info">Courses</h5>
                    <h2><?= $totalCourses ?></h2>
                    <a href="/school_management/public/courses" class="btn btn-info btn-sm mt-2">Manage</a>
                </div>
            </div>

            <!-- Enrollments -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5 class="text-secondary">Enrollments</h5>
                    <h2><?= $totalEnrollments ?></h2>
                    <a href="/school_management/public/enrollments" class="btn btn-secondary btn-sm mt-2">Manage</a>
                </div>
            </div>

            <!-- Timetable -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5 class="text-dark">Timetable</h5>
                    <h2>—</h2>
                    <a href="/school_management/public/timetable" class="btn btn-dark btn-sm mt-2">Manage</a>
                </div>
            </div>

            <!-- Bulletins -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5 class="text-danger">Bulletins</h5>
                    <h2>—</h2>
                    <a href="/school_management/public/bulletins" class="btn btn-danger btn-sm mt-2">View</a>
                </div>
            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="/school_management/public/assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>