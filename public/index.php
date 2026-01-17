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
require_once __DIR__ . '/../app/controllers/EnrollmentController.php';
require_once __DIR__ . '/../app/controllers/GradeController.php';
require_once __DIR__ . '/../app/controllers/BulletinController.php';
require_once __DIR__ . '/../app/controllers/TimetableController.php';


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = str_replace('/school_management/public/index.php', '', $uri);
$uri = str_replace('/school_management/public', '', $uri);

$auth = new AuthController();
$studentController = new StudentController();
$teacherController = new TeacherController();
$subjectController = new SubjectController();
$courseController = new CourseController();
$enrollmentController = new EnrollmentController();
$gradeController = new GradeController();
$bulletinController = new BulletinController();
$timetableController = new TimetableController();

if ($uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $auth->login();
} elseif ($uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth->authenticate();
} elseif ($uri === '/logout') {
    $auth->logout();
}

/* ===== DASHBOARDS ===== */ elseif ($uri === '/dashboard/admin') {
    require_once __DIR__ . '/../app/core/Auth.php';
    Auth::admin();
    require_once __DIR__ . '/../app/views/dashboard/admin.php';
} elseif ($uri === '/dashboard/teacher') {
    require_once __DIR__ . '/../app/core/Auth.php';
    Auth::teacher();
    require_once __DIR__ . '/../app/views/dashboard/teacher.php';
} elseif ($uri === '/dashboard/student') {
    require_once __DIR__ . '/../app/core/Auth.php';
    Auth::student();
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
}

/* ==== ENROLLMENT ==== */ elseif ($uri === '/enrollments') {
    $enrollmentController->index();
} elseif ($uri === '/enrollments/create') {
    $enrollmentController->create();
} elseif ($uri === '/enrollments/store') {
    $enrollmentController->store();
} elseif ($uri === '/enrollments/delete') {
    $enrollmentController->delete();
}

/* ==== GRADES ==== */ elseif ($uri === '/grades') {
    $gradeController->myCourses();
} elseif ($uri === '/grades/course') {
    $gradeController->students($_GET['course_id']);
} elseif ($uri === '/grades/save') {
    $gradeController->save();
}

/* ==== BULLETIN ==== */ elseif ($uri === '/student/bulletin') {
    $gradeController->bulletin();
} elseif ($uri === '/bulletin') {
    $bulletinController->myBulletin();
} elseif ($uri === '/bulletin/student') {
    $bulletinController->studentBulletin();
}

/* ==== TIMETABLE ==== */ elseif ($uri === '/timetable') {
    $timetableController->index();
} elseif ($uri === '/timetable/create') {
    $timetableController->create();
} elseif ($uri === '/timetable/delete') {
    $timetableController->delete();
} elseif ($uri === '/timetable/student') {
    $timetableController->student();
} elseif ($uri === '/timetable/teacher') {
    $timetableController->teacher();
} else {
    echo "Page not found!";
}