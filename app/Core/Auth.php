<?php

namespace App\Core;

class Auth
{
    public static function check(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function isAdmin(): bool
    {
        return self::check() && $_SESSION['user']['role'] === 'admin';
    }
}
