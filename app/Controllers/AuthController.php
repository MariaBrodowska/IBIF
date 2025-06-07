<?php

namespace App\Controllers;

class AuthController
{
    public function login(): void
    {
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    public function register(): void
    {
        require_once __DIR__ . '/../Views/auth/register.php';
    }
}
