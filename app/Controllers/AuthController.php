<?php

namespace App\Controllers;

require_once __DIR__ . '/../Core/View.php';
use App\Core\View;

class AuthController
{
    public function login(): void
    {
        View::render('auth/login');
    }

    public function register(): void
    {
        View::render('auth/register');
        // require_once __DIR__ . '/../Views/auth/register.php';
    }
}
