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

<h1>Teacher Dashboard</h1>
<p>Welcome
    <?= htmlspecialchars($_SESSION['user']['name']) ?>
</p>

<div style="display:flex; gap:20px; flex-wrap:wrap;">

    <div style="border:1px solid #000; padding:15px; width:200px;">
        <h3>My Courses</h3>
        <p>
            <?= $totalCourses ?> course(s)
        </p>
        <a href="/school_management/public/grades">Manage Grades</a>
    </div>

    <div style="border:1px solid #000; padding:15px; width:200px;">
        <h3>Timetable</h3>
        <p>
            <?= $totalTimetable ?> slot(s)
        </p>
        <a href="/school_management/public/timetable/teacher">View Timetable</a>
    </div>

</div>

<br>
<a href="/school_management/public/index.php/logout">Logout</a>