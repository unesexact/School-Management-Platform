<?php

class Auth
{
    private static function redirectLogin()
    {
        header("Location: /school_management/public/index.php/login");
        exit;
    }

    public static function check()
    {
        if (!isset($_SESSION['user'])) {
            self::redirectLogin();
        }
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
