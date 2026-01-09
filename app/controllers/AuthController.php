<?php
class AuthController
{
    public function login()
    {
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function authenticate()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Temporary fake users
        if ($email === "admin@test.com" && $password === "1234") {
            $_SESSION['user_id'] = 1;
            $_SESSION['user_name'] = "Admin";
            $_SESSION['role'] = "admin";
        } elseif ($email === "teacher@test.com" && $password === "1234") {
            $_SESSION['user_id'] = 2;
            $_SESSION['user_name'] = "Teacher";
            $_SESSION['role'] = "teacher";
        } elseif ($email === "student@test.com" && $password === "1234") {
            $_SESSION['user_id'] = 3;
            $_SESSION['user_name'] = "Student";
            $_SESSION['role'] = "student";
        } else {
            echo "Invalid login";
            return;
        }

        // Redirect based on role
        switch ($_SESSION['role']) {
            case 'admin':
                header("Location: /school_management/public/index.php/dashboard/admin");
                break;
            case 'teacher':
                header("Location: /school_management/public/index.php/dashboard/teacher");
                break;
            case 'student':
                header("Location: /school_management/public/index.php/dashboard/student");
                break;
        }
        exit;
    }


    public function logout()
    {
        session_destroy();
        header("Location: /school_management/public/index.php/login");
        exit;
    }

}
