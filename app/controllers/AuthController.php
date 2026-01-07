<?php
class AuthController
{
    public function login()
    {
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function authenticate()
    {
        echo "POST reached!";
        exit;
    }

    public function logout()
    {
        // Will implement later
    }
}
