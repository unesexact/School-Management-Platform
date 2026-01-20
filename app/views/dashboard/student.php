<?php
require_once __DIR__ . '/../../core/Auth.php';
require_once __DIR__ . '/../../models/Grade.php';

Auth::student();

$gradeModel = new Grade();
$grades = $gradeModel->getGradesByStudent($_SESSION['user']['id']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .cards {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        .card {
            border: 1px solid #000;
            padding: 15px;
            width: 220px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Student Dashboard</h1>
<p>Welcome <strong><?= htmlspecialchars($_SESSION['user']['name']) ?></strong></p>

<div class="cards">
    <div class="card">
        <h3>My Timetable</h3>
        <a href="/school_management/public/timetable/student">View</a>
    </div>

    <div class="card">
        <h3>My Bulletin</h3>
        <a href="/school_management/public/bulletin">View</a>
    </div>
</div>

<h2>My Courses & Grades</h2>

<?php if (empty($grades)): ?>
    <p>No grades available yet.</p>
<?php else: ?>
    <table>
        <tr>
            <th>Subject</th>
            <th>Teacher</th>
            <th>Grade /20</th>
        </tr>

        <?php foreach ($grades as $g): ?>
            <tr>
                <td><?= htmlspecialchars($g['subject']) ?></td>
                <td><?= htmlspecialchars($g['teacher']) ?></td>
                <td><?= number_format($g['grade'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<br>
<a href="/school_management/public/index.php/logout">Logout</a>

</body>
</html>
