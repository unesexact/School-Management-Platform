<?php

class AuthController
{
    public function login()
    {
        // If already logged in, redirect immediately
        if (isset($_SESSION['user'])) {
            $role = $_SESSION['user']['role'];
            header("Location: /school_management/public/index.php/dashboard/$role");
            exit;
        }

        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function authenticate()
    {
        require_once __DIR__ . '/../models/User.php';

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            echo "Invalid email or password";
            return;
        }

        // ✅ STORE SESSION (NO ECHO, NO PRINT)
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => strtolower($user['role']),
        ];

        // ✅ REDIRECT
        header("Location: /school_management/public/index.php/dashboard/{$_SESSION['user']['role']}");
        exit;
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        header("Location: /school_management/public/index.php/login");
        exit;
    }
}
