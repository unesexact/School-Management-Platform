<?php
require_once __DIR__ . '/../../core/Auth.php';
require_once __DIR__ . '/../../models/Student.php';
require_once __DIR__ . '/../../models/Teacher.php';
require_once __DIR__ . '/../../models/Course.php';
require_once __DIR__ . '/../../models/Subject.php';
require_once __DIR__ . '/../../models/Enrollment.php';

Auth::admin();

// Get counts
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

<h1>Admin Dashboard</h1>
<p>Welcome <?= htmlspecialchars($_SESSION['user']['name']) ?></p>

<div style="display:flex; gap:20px; flex-wrap:wrap;">
    <div style="border:1px solid #000; padding:10px;">
        <h3>Students (<?= $totalStudents ?>)</h3>
        <a href="/school_management/public/students">Manage</a>
    </div>

    <div style="border:1px solid #000; padding:10px;">
        <h3>Teachers (<?= $totalTeachers ?>)</h3>
        <a href="/school_management/public/teachers">Manage</a>
    </div>

    <div style="border:1px solid #000; padding:10px;">
        <h3>Subjects (<?= $totalSubjects ?>)</h3>
        <a href="/school_management/public/subjects">Manage</a>
    </div>

    <div style="border:1px solid #000; padding:10px;">
        <h3>Courses (<?= $totalCourses ?>)</h3>
        <a href="/school_management/public/courses">Manage</a>
    </div>

    <div style="border:1px solid #000; padding:10px;">
        <h3>Enrollments (<?= $totalEnrollments ?>)</h3>
        <a href="/school_management/public/enrollments">Manage</a>
    </div>

    <div style="border:1px solid #000; padding:10px;">
        <h3>Timetable</h3>
        <a href="/school_management/public/timetable">Manage</a>
    </div>

    <div style="border:1px solid #000; padding:10px;">
        <h3>Bulletins</h3>
        <a href="/school_management/public/bulletins">Students Bulletins</a>
    </div>
</div>

<br>
<a href="/school_management/public/index.php/logout">Logout</a>