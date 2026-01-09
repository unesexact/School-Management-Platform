<?php
class AuthController
{
    public function login()
    {
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function authenticate()
    {
        // Fake login (connect DB later)
        $email = $_POST['email'];
        $password = $_POST['password'];

        // TEMP user 
        if ($email === "admin@test.com" && $password === "1234") {
            $_SESSION['user_id'] = 1;
            $_SESSION['user_name'] = "Admin";
            $_SESSION['role'] = "admin";

            header("Location: /school_management/public/index.php/dashboard");
            exit;
        } else {
            echo "Invalid login";
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /school_management/public/index.php/login");
        exit;
    }

}
