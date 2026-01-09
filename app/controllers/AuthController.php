<?php
class AuthController
{
    public function login()
    {
        require_once __DIR__ . '/../views/auth/login.php';
    }


    public function authenticate()
    {
        require_once __DIR__ . '/../models/User.php';

        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if (!$user) {
            echo "Invalid email or password";
            return;
        }

        // For now (until we hash later)
        if ($password !== $user['password']) {
            echo "Invalid email or password";
            return;
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        // Redirect by role
        switch ($user['role']) {
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
