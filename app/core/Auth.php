<?php

class Auth
{
    private static function redirectLogin()
    {
        header("Location: /school_management/public/index.php/login");
        exit;
    }

    // Check login + session timeout
    public static function check()
    {
        if (!isset($_SESSION['user'])) {
            self::redirectLogin();
        }

        // Auto logout after 30 minutes of inactivity
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
            session_unset();
            session_destroy();
            self::redirectLogin();
        }

        // Update last activity time
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public static function admin()
    {
        self::check();
        if ($_SESSION['user']['role'] !== 'admin') {
            self::redirectLogin();
        }
    }

    public static function teacher()
    {
        self::check();
        if ($_SESSION['user']['role'] !== 'teacher') {
            self::redirectLogin();
        }
    }

    public static function student()
    {
        self::check();
        if ($_SESSION['user']['role'] !== 'student') {
            self::redirectLogin();
        }
    }
}
