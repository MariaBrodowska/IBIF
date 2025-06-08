<?php

namespace App\Core;

class Auth
{
    public static function isLoggedIn(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function isAdmin(): bool
    {
        return self::isLoggedIn() && $_SESSION['user']['role'] === 'admin';
    }

    public static function isUser(): bool
    {
        return self::isLoggedIn() && $_SESSION['user']['role'] === 'user';
    }

    public static function login(array $user): void
    {
        $_SESSION['user'] = $user;
    }

    public static function logout(): void
    {
        session_unset();
        session_destroy();
    }
}
