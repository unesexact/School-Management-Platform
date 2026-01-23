<?php
require_once __DIR__ . '/../../core/Auth.php';
require_once __DIR__ . '/../../models/Grade.php';

Auth::student();

$gradeModel = new Grade();
$grades = $gradeModel->getGradesByStudent($_SESSION['user']['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>

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

        table {
            background: white;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Student Dashboard</h2>
                <p class="text-muted">Welcome <?= htmlspecialchars($_SESSION['user']['name']) ?></p>
            </div>
            <a href="/school_management/public/index.php/logout" class="btn btn-danger">
                Logout
            </a>
        </div>

        <!-- Cards -->
        <div class="row g-4 mb-4">

            <!-- Timetable -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5 class="text-warning">My Timetable</h5>
                    <h2>—</h2>
                    <a href="/school_management/public/timetable/student" class="btn btn-warning btn-sm mt-2">
                        View Timetable
                    </a>
                </div>
            </div>

            <!-- Bulletin -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5 class="text-danger">My Bulletin</h5>
                    <h2>—</h2>
                    <a href="/school_management/public/bulletin" class="btn btn-danger btn-sm mt-2">
                        View Bulletin
                    </a>
                </div>
            </div>

        </div>

        <!-- Grades Table -->
        <div class="card p-4">
            <h4 class="mb-3">My Courses & Grades</h4>

            <?php if (empty($grades)): ?>
                <div class="alert alert-info">
                    No grades available yet.
                </div>
            <?php else: ?>
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Subject</th>
                            <th>Teacher</th>
                            <th>Grade /20</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($grades as $g): ?>
                            <tr>
                                <td><?= htmlspecialchars($g['subject']) ?></td>
                                <td><?= htmlspecialchars($g['teacher']) ?></td>
                                <td><?= number_format($g['grade'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="/school_management/public/assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>