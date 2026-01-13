<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/StudentController.php';
require_once __DIR__ . '/../app/controllers/TeacherController.php';
require_once __DIR__ . '/../app/controllers/SubjectController.php';
require_once __DIR__ . '/../app/controllers/CourseController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = str_replace('/school_management/public/index.php', '', $uri);
$uri = str_replace('/school_management/public', '', $uri);

$auth = new AuthController();
$studentController = new StudentController();
$teacherController = new TeacherController();
$subjectController = new SubjectController();
$courseController = new CourseController();

if ($uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $auth->login();
} elseif ($uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth->authenticate();
} elseif ($uri === '/logout') {
    $auth->logout();
}

/* ===== DASHBOARDS ===== */ elseif ($uri === '/dashboard/admin') {
    require_once __DIR__ . '/../app/views/dashboard/admin.php';
} elseif ($uri === '/dashboard/teacher') {
    require_once __DIR__ . '/../app/views/dashboard/teacher.php';
} elseif ($uri === '/dashboard/student') {
    require_once __DIR__ . '/../app/views/dashboard/student.php';
}

/* ===== STUDENT CRUD ===== */ elseif ($uri === '/students') {
    $studentController->index();
} elseif ($uri === '/students/create') {
    $studentController->create();
} elseif ($uri === '/students/delete') {
    $studentController->delete();
}

/* ==== TEACHER CRUD ==== */ elseif ($uri === '/teachers') {
    $teacherController->index();
} elseif ($uri === '/teachers/create') {
    $teacherController->create();
} elseif ($uri === '/teachers/delete') {
    $teacherController->delete();
}

/* ==== SUBJECT CRUD ==== */ elseif ($uri === '/subjects') {
    $subjectController->index();
} elseif ($uri === '/subjects/create') {
    $subjectController->create();
} elseif ($uri === '/subjects/delete') {
    $subjectController->delete();
}

/* ==== COURSE CRUD ==== */ elseif ($uri === '/courses') {
    $courseController->index();
} elseif ($uri === '/courses/create') {
    $courseController->create();
} elseif ($uri === '/courses/delete') {
    $courseController->delete();
} else {
    echo "Page not found!";
}