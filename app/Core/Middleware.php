<?php

namespace App\Core;

require_once __DIR__ . '/Auth.php';
use App\Core\Auth;

class Middleware
{
    public static function requireUser(): void
    {
        if (!Auth::isUser()) {
            header('Location: /IBIF/public/login');
            exit;
        }
    }

    public static function requireAdmin(): void
    {
        if (!Auth::isAdmin()) {
            header('Location: /IBIF/public/login');
            exit;
        }
        
    }

    public static function requireAuth(): void
    {
        if (Auth::isLoggedIn()) {
            if (Auth::isAdmin()) {
                header('Location: /IBIF/public/admin/dashboard');
            } else {
                header('Location: /IBIF/public/user/dashboard');
            }
            exit;
        }
    }
}
