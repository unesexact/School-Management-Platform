<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../app/controllers/AuthController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Fix: remove project + public + index.php
$uri = str_replace('/school_management/public/index.php', '', $uri);
$uri = str_replace('/school_management/public', '', $uri);

$auth = new AuthController();

if ($uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $auth->login();
} elseif ($uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth->authenticate();
} elseif ($uri === '/logout') {
    $auth->logout();
} elseif ($uri === '/dashboard/admin') {
    require_once __DIR__ . '/../app/views/dashboard/admin.php';
} elseif ($uri === '/dashboard/teacher') {
    require_once __DIR__ . '/../app/views/dashboard/teacher.php';
} elseif ($uri === '/dashboard/student') {
    require_once __DIR__ . '/../app/views/dashboard/student.php';
} else {
    echo "Page not found!";
}

